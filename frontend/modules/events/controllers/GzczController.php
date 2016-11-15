<?php

namespace frontend\modules\events\controllers;

use yii\web\Controller;

/**
 * Default controller for the `events` module
 */
class GzczController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionConnect()
    {
        $userAgent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
        $userIp = Yii::$app->request->getUserIP();

        var_dump($userIp,$userAgent);exit;
    }

    public function actionCallback(){

    }

    public function actionVoteList(){

    }

    public function actionVotes(){

    }

    public function actionShare(){

    }
}
