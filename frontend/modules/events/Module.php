<?php

namespace frontend\modules\events;

/**
 * events module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\events\controllers';

    public $defaultController = 'gzcz';

    public $defaultRoute = 'gzcz';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
