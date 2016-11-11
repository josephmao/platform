<?php
namespace common\components;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;
use OSS\OssClient;
use OSS\Core\OssException;

/**
 * Class OssComponent
 *
 * 基于阿里云oss－sdk 封装的，文件上传类
 *
 */
class OssComponent extends Component{

    /**
     * 公共文件存储服务
     * * @param bool|FALSE $object 上传文件
     * @param bool|true $rename 是否重命名
     * @return string content-type
     */
    public function publicFile($object = FALSE, $rename = true){

        if($object != FALSE && $object instanceof UploadedFile){
            $tmpName = $object->tempName;
            if($rename){
                $baseName = md5($tmpName.rand());
            }else{
                $baseName = $object->baseName;
            }
            $filePath = $baseName . '.' . $object->extension;
            $fileName = $object->baseName;

        }elseif($object != FALSE && is_array($object) && isset($object['tmp_name'])) {
            $tmpName = $object['tmp_name'];
            $fileName = $object['name'];
            if($rename){
                $baseName = md5($fileName.rand());
                $extension = substr($fileName,strrpos($fileName, '.')+1);
                $filePath = $baseName .'.'.$extension;
            }else{
                $filePath = $object['name'];
            }
        }

        $bucket_name = 'oss-imgs';
        $region = 'oss-cn-beijing';

        $url = 'http://'.$bucket_name.'.thinkpower.top/' . $filePath;
        //$url = 'https://'.$bucket_name.'.'.$region.'.aliyuncs.com/' . $filePath;
        
        $cfg = Yii::$app->params['auth']['oss'];

        try {
            $ssoclient = new OssClient($cfg['accessKeyId'], $cfg['accessKeySecret'], $region.'.aliyuncs.com');
        } catch (OssException $e) {
            return ['error' => $e->getErrorMessage()];
        }

        try{
            $ssoclient->uploadFile($bucket_name, $filePath, $tmpName);
            
            return ['file_name' => $fileName,'url' => $url];   
        } catch(OssException $e) {
            return ['error' => $e->getErrorMessage()];
        }
    }

    public function publicImageBase64($object = FALSE){
	if($object != FALSE){
		$pattern = '/^(data:\image\/(\w+);base64,)/';
        	preg_match($pattern,$object,$result);

		$baseName = md5(time().rand());

		if(!isset($result[1])){
			$image = $object;	
			$filePath = 'gzcz/'.$baseName.'.png';
		}else{
			$image= str_replace($result[1],'',$object);
                        $filePath = 'gzcz/'.$baseName . '.'.$result[2];
		}

		$bucket_name = 'oss-imgs';
        	$region = 'oss-cn-beijing';

        	$url = 'http://'.$bucket_name.'.thinkpower.top/' . $filePath;
        	$cfg = Yii::$app->params['auth']['oss'];

		try {
            		$ssoclient = new OssClient($cfg['accessKeyId'], $cfg['accessKeySecret'], $region.'.aliyuncs.com');
        	} catch (OssException $e) {
            		return ['error' => $e->getErrorMessage()];
        	}   
        
        	try{
			$ssoclient->putObject($bucket_name, $filePath, base64_decode($image));
            		//$ssoclient->uploadFile($bucket_name, $filePath, $tmpName);
            
            		return ['file_name' => $filePath,'url' => $url];
        	} catch(OssException $e) { 
            		return ['error' => $e->getErrorMessage()];
        	}

	}
    }

    /**
     * 公共图片存储服务
     * @param bool|FALSE $object 上传文件
     * @param bool|true $rename 是否重命名
     * @return array
     */
    public function publicImage($object = FALSE, $rename = true){
        if($object != FALSE && $object instanceof UploadedFile){

            $tmpName = $object->tempName;
            if($rename){
                $baseName = md5($tmpName.rand());
            }else{
                $baseName = $object->baseName;
            }
            $filePath = $baseName . '.' . $object->extension;
            $fileName = $object->baseName;
        }elseif($object != FALSE && is_array($object) && isset($object['tmp_name'])) {
            $tmpName = $object['tmp_name'];
            $fileName = $object['name'];
            if($rename){
                $baseName = md5($fileName.rand());
                $extension = substr($fileName,strrpos($fileName, '.')+1);
                $filePath = $baseName .'.'.$extension;
            }else{
                $filePath = $object['name'];
            }

        }

        $bucket_name = 'oss-imgs';
        
        $region = 'oss-cn-beijing';

        $url = 'http://'.$bucket_name.'.thinkpower.top/' . $filePath;
        
        $cfg = Yii::$app->params['auth']['oss'];

        try {
            $ssoclient = new OssClient($cfg['accessKeyId'], $cfg['accessKeySecret'], $region.'.aliyuncs.com');
        } catch (OssException $e) {
            return ['error' => $e->getErrorMessage()];
        }

        try{
            $ssoclient->uploadFile($bucket_name, $filePath, $tmpName);
            
            return ['file_name' => $fileName,'url' => $url];   
        } catch(OssException $e) {
            return ['error' => $e->getErrorMessage()];
        }
    }


    private function getBucket($bucket_name = ''){
        $lists = \backend\modules\storage\models\Buckets::showLists();
        
        if(!isset($lists[$bucket_name])){
            return FALSE;
        }
    }
}
