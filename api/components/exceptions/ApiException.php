<?php
namespace api\components\exceptions;

use yii\web\HttpException;

class ApiException  extends HttpException{
    
    public $statusCode = 400;


    /**
     * Constructor.
     * @param integer $code error code
     * @param string $params error params
     * @param \Exception $previous The previous exception used for the exception chaining.
     */
    public function __construct($identifier = '', $params = NULL, \Exception $previous = NULL)
    {
        $errorCodes = \Yii::$app->params['codeErrors'];
        
        $error = isset($errorCodes[$identifier])?$errorCodes[$identifier]:'';
        
        $code = isset($error[0]) ? $error[0] : 0;
        $message = isset($error[1]) ? $error[1] : '未定义的错误';
        
        if(strstr($message,'%s') && $params != NULL)
                $message = str_replace('%s',$params,$message);
                
        parent::__construct($this->statusCode, $message, $code, $previous);
    }
}