<?php

namespace api\v1\game\controllers;

use Yii;
use yii\rest\Controller;
use yii\base\ErrorException;
use api\components\exceptions\ApiException;
use Httpful\Request;
use Httpful\Mime;
use Httpful\Http;
use api\v1\game\models\Pageview;
use api\v1\game\models\Score;
use yii\helpers\Url;
use dosamigos\qrcode\QrCode;

class FlashController extends Controller{

    public function actionInit()
    {
        $userAgent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
        $userIp = Yii::$app->request->getUserIP();

        $identifier = trim(file_get_contents('http://localhost:9013'));
        
        $model = new Pageview();
        $model->identifier = $identifier;
        $model->user_agent = $userAgent;
        $model->user_ip = $userIp;
        $model->save();

        return ['status' => 200,'identifier' => $identifier];
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

        $baseName = md5($identifier);
        $filePath = Yii::getAlias('@api').'/web/uploads/' . $baseName . '.png';
		$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/uploads/' . $baseName . '.png';
        $qr = QrCode::png('http://h5.thinkpower.top/wechat/connect/flash?identifier='.$identifier.'&score='.$score.'&cost_time='.$costTime.'&user_agent='.urlencode($userAgent).'&user_ip='.urlencode($userIp),$filePath);

        return ['status' =>200,'qrcode' => $url];
    }
}