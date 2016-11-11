<?php

namespace backend\modules\wechat\controllers;

use Redis;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use common\modules\basic\models\UserWechatInfo;

/**
 * Default controller for the `wechat` module
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','rank-daily','rank-total'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $query = UserWechatInfo::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_time' => SORT_DESC,
                ]
            ],
        ]);
        return $this->render('index',[
            'provider' => $provider,
        ]);
    }

    public function actionRankDaily(){
        $redis = new Redis();
        $cfg = Yii::$app->get('redis');

        $redis->connect($cfg->hostname, $cfg->port);
        if ($cfg->password != '')
            $redis->auth($cfg->password);

        $date = Yii::$app->request->get('date',date('Y-m-d',strtotime('-1 day')));
        $dailyRank = $redis->ZREVRANGE('rank_daily_'.$date,0,-1,true);
        

        $dailyArray = [];
        foreach($dailyRank as $rank => $score){
            $row = json_decode($rank,true);
            $user = UserWechatInfo::find()->where(['identifier' => $row['identifier']])->one();
            $row['real_name'] = isset($user->real_name)?$user->real_name:'';
            $row['phone'] = isset($user->phone)?$user->phone:'';
            $row['score'] = $score;
            $dailyArray[] = $row;
        }

        $provider = new ArrayDataProvider([
            'allModels' => $dailyArray,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['score'],
            ],
        ]);

        return $this->render('daily',[
            'provider' => $provider,
            'date' => $date,
        ]);
    }

    public function actionRankTotal(){
        $redis = new Redis();
        $cfg = Yii::$app->get('redis');

        $redis->connect($cfg->hostname, $cfg->port);
        if ($cfg->password != '')
            $redis->auth($cfg->password);

        $totalRank = $redis->ZREVRANGE('rank_total',0,-1,true);
        $totalArray = [];
        foreach($totalRank as $rank => $score){
            $row = json_decode($rank,true);
            $user = UserWechatInfo::find()->where(['identifier' => $row['identifier']])->one();
            $row['real_name'] = isset($user->real_name)?$user->real_name:'';
            $row['phone'] = isset($user->phone)?$user->phone:'';
            $row['score'] = $score;
            $totalArray[] = $row;
        }

        $provider = new ArrayDataProvider([
            'allModels' => $totalArray,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['score'],
            ],
        ]);

        return $this->render('total',[
            'provider' => $provider,
        ]);
    }
}
