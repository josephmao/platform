<?php

namespace api\v1;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\v1\controllers';

    public function init()
    {
        parent::init();

        $this->modules = [
            'game' => [
                'class' => 'api\v1\game\Module',
            ],
        ];
    }
}