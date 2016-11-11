<?php

namespace frontend\modules\wechat\controllers;

use Redis;
use Yii;
use yii\web\ServerErrorHttpException;
use yii\web\Controller;
use yii\helpers\Url;
use Httpful\Request;
use Httpful\Mime;
use Httpful\Http;
use api\v1\game\models\Pageview;
use api\v1\game\models\Score;
use dosamigos\qrcode\QrCode;
use common\modules\basic\models\UserWechatInfo;
use common\modules\basic\models\RankDaily;
use common\modules\basic\models\RankTotal;


class ConnectController extends Controller{

    public function actionIndex(){
	    $callback = 'http://h5.thinkpower.top/wechat/connect/callback';
	    //$identifier = Yii::$app->session->get('identifier');
	    //if(!isset($identifier))
        	return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid='.Yii::$app->params['appid'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo');

	    $user = UserWechatInfo::find()->where(['identifier' => $identifier])->one();			
	    if(!isset($user))
		    return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid='.Yii::$app->params['appid'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo');

	    if(!isset($user->real_name) || $user->real_name == ''|| !isset($user->phone) || $user->phone == '')
            return $this->redirect(['/wechat/connect/register']);

        return $this->redirect(['/wechat/connect/rank']);	
    }

    public function actionFlash(){
        $score = Yii::$app->request->get('score');
        $costTime = Yii::$app->request->get('cost_time');
        $userAgent = Yii::$app->request->get('user_agent');
        $userIp = Yii::$app->request->get('user_ip');

	    Yii::$app->session->set('callback_info',json_encode(['score' => $score,'cost_time' => $costTime,'user_ip' => $userIp,'user_agent' => $userAgent]));

        $identifier = Yii::$app->session->get('identifier');
        $callback = 'http://h5.thinkpower.top/wechat/connect/flash-callback';
        if(!isset($identifier))
            return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid='.Yii::$app->params['appid'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo');

        $user = UserWechatInfo::find()->where(['identifier' => $identifier])->one();			
	    if(!isset($user))
		    return $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid='.Yii::$app->params['appid'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo');

	    if(!isset($user->real_name) || $user->real_name == ''|| !isset($user->phone) || $user->phone == '')
            return $this->redirect(['/wechat/connect/register']);

        return $this->redirect(['/wechat/connect/rank']);
    }

    public function actionFlashCallback(){
        $code = Yii::$app->request->get('code','');
	    $callbackInfo = Yii::$app->session->get('callback_info');
        $stateArray = json_decode($callbackInfo,true);
        $score = $stateArray['score'];
        $costTime = $stateArray['cost_time'];
        $userAgent = $stateArray['user_agent'];
        $userIp = $stateArray['user_ip'];

        $identifier = Yii::$app->session->get('identifier');
        if(isset($identifier)){
            $user = UserWechatInfo::find()->where(['identifier' => $identifier])->one();
            if(isset($user)){
                $openid = $user->openid;
            }
        }

        if(!isset($openid) || !isset($user)){
            $res = Request::get('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.Yii::$app->params['appid'].'&secret='.Yii::$app->params['secret'].'&code='.$code.'&grant_type=authorization_code')->send()->body;
            $result= json_decode($res, true);

            if(isset($result['errorcode'])){
                return $this->redirect(['/wechat/connect']);
            }

            $user = UserWechatInfo::find()->where(['openid' => $result['openid']])->one();
            if(!isset($user))
                $user = new UserWechatInfo();

            $user->identifier = $result['openid'];
            $user->openid = $result['openid'];
            $user->unionid = $result['unionid'];
            $user->access_token = $result['access_token'];
            $user->fresh_token = $result['refresh_token'];
            $user->access_expires_in = time()+intval($result['expires_in']);
            if(!isset($user->fresh_expires_in) || $user->fresh_token != $result['refresh_token'])
                $user->fresh_expires_in = strtotime('+30 days');
	        $user->created_time = isset($user->created_time)?$user->created_time:date('Y-m-d H:i:s');
            $user->save();

            Yii::$app->session->set('identifier',$user->identifier);
        }

        if(!isset($user->nickname) || !isset($user->headimgurl)){
            $info = Request::get('https://api.weixin.qq.com/sns/userinfo?access_token='.$user->access_token.'&openid='.$user->openid)->send()->body;
            $info = json_decode($info,true);

            $nicknameNoEmoji = preg_replace('~\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]~', '', $info['nickname']);

            $user->nickname = base64_encode($nicknameNoEmoji);
            $user->sex = strval($info['sex']);
            $user->province = $info['province'];
            $user->city = $info['city'];
            $user->country = $info['country'];
            $user->headimgurl = $info['headimgurl'];
            $user->save();
        }else
            $nicknameNoEmoji = base64_decode($user->nickname);

        $model = new Score();
        $model->identifier = $user->identifier;
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

        $info = json_encode(['headimgurl' => $user->headimgurl,'nickname' => $nicknameNoEmoji,'identifier' => $user->identifier]); 
        $redis->ZINCRBY('rank_daily_'.date('Y-m-d'),$score,$info);
        $redis->ZINCRBY('rank_total',$score,$info);

        
        if(!isset($user->real_name) || !isset($user->phone))
            return $this->redirect(['/wechat/connect/register']);

        return $this->redirect(['/wechat/connect/rank']);
    }


    public function actionCallback(){
        /*$identifier = Yii::$app->session->get('identifier');
        if(isset($identifier)){
            $user = UserWechatInfo::find()->where(['identifier' => $identifier])->one();
            if(isset($user)){
                $openid = $user->openid;
            }
        }
	*/

        if(!isset($openid) || !isset($user)){
            $code = Yii::$app->request->get('code','');
            $state = Yii::$app->request->get('state','');

            $res = Request::get('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.Yii::$app->params['appid'].'&secret='.Yii::$app->params['secret'].'&code='.$code.'&grant_type=authorization_code')->send()->body;
            $result= json_decode($res, true);

		$info = Request::get('https://api.weixin.qq.com/sns/userinfo?access_token='.$result['access_token'].'&openid='.$result['openid'])->send()->body;
var_dump($info);exit;

            if(isset($result['errorcode'])){
                return $this->redirect(['/wechat/connect']);
            }

            $user = UserWechatInfo::find()->where(['openid' => $result['openid']])->one();
            if(!isset($user))
                $user = new UserWechatInfo();

            $user->identifier = $result['openid'];
            $user->openid = $result['openid'];
            $user->unionid = $result['unionid'];
            $user->access_token = $result['access_token'];
            $user->fresh_token = $result['refresh_token'];
            $user->access_expires_in = time()+intval($result['expires_in']);
            if(!isset($user->fresh_expires_in) || $user->fresh_token != $result['refresh_token'])
                $user->fresh_expires_in = strtotime('+30 days');
	        $user->created_time = isset($user->created_time)?$user->created_time:date('Y-m-d H:i:s');
            $user->save();

            $openid = $result['openid'];

            Yii::$app->session->set('identifier',$user->identifier);
        }

        if(!isset($user->nickname) || !isset($user->headimgurl)){
            $info = Request::get('https://api.weixin.qq.com/sns/userinfo?access_token='.$user->access_token.'&openid='.$user->openid)->send()->body;
            $info = json_decode($info,true);

	        $nicknameNoEmoji = preg_replace('~\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]~', '', $info['nickname']);

            $user->nickname = base64_encode($nicknameNoEmoji);
            $user->sex = strval($info['sex']);
            $user->province = $info['province'];
            $user->city = $info['city'];
            $user->country = $info['country'];
            $user->headimgurl = $info['headimgurl'];
            $user->save();
        }
        
        if(!isset($user->real_name) || !isset($user->phone))
            return $this->redirect(['/wechat/connect/register']);

        return $this->redirect(['/wechat/connect/rank']);
    }

    public function actionRegister(){
        $identifier = Yii::$app->session->get('identifier');
        if(!isset($identifier))
            return $this->redirect(['/wechat/connect']);

	    $model = UserWechatInfo::find()->where(['identifier' => $identifier])->one();
        if(!isset($model))
	        return $this->redirect(['/wechat/connect']);


        $request = Yii::$app->request;

        if($request->isPost){
            $data = $request->post('UserWechatInfo');
            if(trim($data['real_name']) != '' && trim($data['phone']) != ''){
                if($model->load($request->post()) && $model->save()){
                    return $this->redirect(['/wechat/connect/rank']);
                }
            }
        }

        return $this->renderFile('@frontend/modules/wechat/views/connect/register.php',[
            'model' => $model,
            'identifier' => $identifier,
        ]);
    }

    public function actionRank(){
        $identifier = Yii::$app->session->get('identifier');
        if(!isset($identifier))
            return $this->redirect(['/wechat/connect']);

        $date = Yii::$app->request->get('date',date('Y-m-d'));

        $userInfo = UserWechatInfo::find()->where(['identifier' => $identifier])->one();

        if(!isset($userInfo))
            return $this->redirect(['/wechat/connect']);


        $redis = new Redis();
        $cfg = Yii::$app->get('redis');

        $redis->connect($cfg->hostname, $cfg->port);
        if ($cfg->password != '')
            $redis->auth($cfg->password);

        $info = json_encode(['headimgurl' => $userInfo->headimgurl,'nickname' => base64_decode($userInfo->nickname),'identifier' => $identifier]);

        $score = $redis->ZSCORE('rank_total',$info);
        $score = ($score == NULL || $score == FALSE) ? 0 : $score;
        $rank = $redis->ZREVRANK('rank_total',$info);

        $rank++;

        $dailyRank = $redis->ZREVRANGE('rank_daily_'.$date,0,-1,true);
        $totalRank = $redis->ZREVRANGE('rank_total',0,-1,true);

        $dailyRank = array_slice($dailyRank,0,10);
        $totalRank = array_slice($totalRank,0,10);

        $dateList = [];
        $today= time();
        $startDate = strtotime('2016-09-02');
        $endDate = strtotime('2016-09-12');
        $endDate = ($endDate>$today) ? $today: $endDate;
        $currentDate = $startDate;
        while($currentDate<$endDate){
            $dateList[date('Y-m-d',$currentDate)] = date('m月d日',$currentDate);
            $currentDate+=24*3600;
        }
        

        return $this->renderFile('@frontend/modules/wechat/views/connect/rank.php',[
            'userInfo' => $userInfo,
            'rank' => $rank,
            'date' => $date,
            'dateList' => $dateList,
            'dailyRank' => $dailyRank,
            'totalRank' => $totalRank,
            'score' => $score,
            'identifier' => $identifier,
        ]);
    }

    public function actionPlay(){
        $identifier = Yii::$app->session->get('identifier');
        if(!isset($identifier))
            return $this->redirect(['/wechat/connect']);

	    $userInfo = UserWechatInfo::find()->where(['identifier' => $identifier])->one();

        if(!isset($userInfo))
            return $this->redirect(['/wechat/connect']);

        return $this->renderFile('@frontend/modules/wechat/views/connect/play.php',[
            'identifier' => $identifier,
        ]);
    }


}
