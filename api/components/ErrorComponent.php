<?php

namespace api\components;

use yii\base\Component;
    
class ErrorComponent extends Component{
    
    public $statusCode = 400;
    
    public function init(){
        parent::init();
    }

    public function show($identifier = '', $params = NULL, \Exception $previous = NULL){
        $errorCodes = \Yii::$app->params['codeErrors'];
        
        $error = isset($errorCodes[$identifier])?$errorCodes[$identifier]:'';
        
        $code = isset($error[0]) ? $error[0] : 0;
        $message = isset($error[1]) ? $error[1] : '未定义的错误';
        
        if(strstr($message,'%s') && $params != NULL)
                $message = str_replace('%s',$params,$message);
                
        throw new \yii\web\HttpException($this->statusCode,$message,$code,$previous);
    }

}