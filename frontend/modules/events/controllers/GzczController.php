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
    public function actionIndex()
    {
        return $this->render('index');
    }
}
