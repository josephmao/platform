<?php

namespace api\v1\game\models;

use Yii;

/**
 * This is the model class for table "platform_pageview".
 *
 * @property string $identifier
 * @property string $user_agent
 * @property string $user_ip
 * @property string $created_at
 */
class Pageview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'platform_pageview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier'], 'required'],
            [['user_agent'], 'string'],
            [['created_at'], 'safe'],
            [['identifier'], 'string', 'max' => 100],
            [['user_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'user_agent' => 'User Agent',
            'user_ip' => 'User Ip',
            'created_at' => 'Created At',
        ];
    }
}
