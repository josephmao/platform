<?php

namespace api\v1\game\controllers;

use Yii;
use Redis;
use yii\rest\Controller;
use yii\base\ErrorException;
use api\components\exceptions\ApiException;
use Httpful\Request;
use Httpful\Mime;
use Httpful\Http;
use api\v1\game\models\Pageview;
use api\v1\game\models\Score;
use yii\helpers\Url;
use common\modules\basic\models\RankDaily;
use common\modules\basic\models\RankTotal;
use common\modules\basic\models\UserWechatInfo;
use dosamigos\qrcode\QrCode;

class MobileController extends Controller{

    public function actionInit()
    {
        $userAgent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
        $userIp = Yii::$app->request->getUserIP();

        $idt = trim(file_get_contents('http://localhost:9013'));
        $identifier = Yii::$app->request->get('identifier',$idt);
        
        $model = new Pageview();
        $model->identifier = $identifier;
        $model->user_agent = $userAgent;
        $model->user_ip = $userIp;
        $model->save();

        return ['status' => 200,'identifier' => $identifier];
    }

    public function actionUpload(){
	$store= '/tmp/game_'.date('Y-m-d').'.log';

	if(!file_exists($store)){
                $fp = fopen("$store","w+");
                fclose($fp);
        }

	$identifier = Yii::$app->request->get('identifier','');

	if('' == $image = Yii::$app->request->post('image',''))
            throw new ApiException('PARAMS_MISSING','image');

	$device_type = Yii::$app->request->post('device','');
			
        //file_put_contents($store, "image is:".$image."\n", FILE_APPEND);	
        $params = \Yii::$app->oss->publicImageBase64($image);

	if(isset($params['error']))
		throw new ApiException('PARAMS_INVALID',$params['error']);
        $url = $params['url'];

        $log = ['identifier' => $identifier,'url' => $url];
        $log = json_encode($log); 
	$log .= "\n";
        file_put_contents($store, $log, FILE_APPEND);

	$baseName = md5($identifier);
        $filePath = Yii::getAlias('@api').'/web/uploads/' . $baseName . '.png';
        $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/uploads/' . $baseName . '.png';

	if($device_type != 'browser'){
		$qr = QrCode::png('http://h5.thinkpower.top/gzcz?identifier='.$identifier.'&url='.urlencode($url),$filePath);
		return ['status' =>200,'qrcode' => $url];	
	}else
		return ['status' => 200,'url' => $url];
    }

    public function actionCredit()
    {

        if('' == $identifier = Yii::$app->request->get('identifier',''))
            throw new ApiException('PARAMS_MISSING', 'identifier');

        if('' == $score = Yii::$app->request->get('score',''))
            throw new ApiException('PARAMS_MISSING', 'score');

        if('' == $costTime = Yii::$app->request->get('cost_time',''))
            throw new ApiException('PARAMS_MISSING', 'cost_time');


        $userAgent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
        $userIp = Yii::$app->request->getUserIP();
        
        $model = new Score();
        $model->identifier = $identifier;
        $model->score = $score;
        $model->cost_time = $costTime;
        $model->user_agent = $userAgent;
        $model->user_ip = $userIp;
        $model->save();

        $redis = new Redis();
        $cfg = Yii::$app->get('redis');

        $redis->connect($cfg->hostname, $cfg->port);
        if ($cfg->password != '')
            $redis->auth($cfg->password);

        $user = UserWechatInfo::find()->where(['identifier' => $identifier])->one(); 

        $info = json_encode(['headimgurl' => $user->headimgurl,'nickname' => base64_decode($user->nickname),'identifier' => $identifier]); 

        $redis->ZINCRBY('rank_daily_'.date('Y-m-d'),$score,$info);
        $redis->ZINCRBY('rank_total',$score,$info);

        $daily = $redis->ZREVRANK('rank_daily_'.date('Y-m-d'),$info);
        $total = $redis->ZREVRANK('rank_total',$info);

        return [
		    'status' => 200,
		    'rank' => ['daily' => $daily,'total' => $total],
            'play_url' => 'http://h5.thinkpower.top/wechat/connect/play?identifier='.$identifier,
            'rank_url' => 'http://h5.thinkpower.top/wechat/connect/rank?identifier='.$identifier,
	    ];

    }
}
