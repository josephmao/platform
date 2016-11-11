<?php

namespace common\modules\basic\models;

use Yii;

/**
 * This is the model class for table "game_user_wechat_info".
 *
 * @property string $identifier
 * @property string $openid
 * @property string $nickname
 * @property string $sex
 * @property string $province
 * @property string $city
 * @property string $country
 * @property string $headimgurl
 * @property string $unionid
 * @property string $access_token
 * @property string $fresh_token
 * @property string $scope
 * @property integer $access_expires_in
 * @property integer $fresh_expires_in
 * @property string $real_name
 * @property string $phone
 * @property string $created_time
 * @property string $updated_time
 */
class UserWechatInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_user_wechat_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier'], 'required'],
            [['access_expires_in', 'fresh_expires_in'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['identifier'], 'string', 'max' => 100],
            [['openid', 'nickname', 'sex', 'province', 'city', 'country', 'headimgurl', 'unionid', 'access_token', 'fresh_token', 'scope'], 'string', 'max' => 255],
            [['real_name'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'openid' => 'Openid',
            'nickname' => 'Nickname',
            'sex' => 'Sex',
            'province' => 'Province',
            'city' => 'City',
            'country' => 'Country',
            'headimgurl' => 'Headimgurl',
            'unionid' => 'Unionid',
            'access_token' => 'Access Token',
            'fresh_token' => 'Fresh Token',
            'scope' => 'Scope',
            'access_expires_in' => 'Access Expires In',
            'fresh_expires_in' => 'Fresh Expires In',
            'real_name' => '姓名',
            'phone' => '电话',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
