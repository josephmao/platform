<?php

namespace api\v1\game\models;

use Yii;

/**
 * This is the model class for table "platform_score".
 *
 * @property string $identifier
 * @property string $score
 * @property integer $cost_time
 * @property string $user_agent
 * @property string $user_ip
 * @property string $created_at
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'platform_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identifier'], 'required'],
            [['cost_time'], 'integer'],
            [['user_agent'], 'string'],
            [['created_at'], 'safe'],
            [['identifier'], 'string', 'max' => 100],
            [['score'], 'string', 'max' => 10],
            [['user_ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'identifier' => 'Identifier',
            'score' => 'Score',
            'cost_time' => 'Cost Time',
            'user_agent' => 'User Agent',
            'user_ip' => 'User Ip',
            'created_at' => 'Created At',
        ];
    }

    public static function getTotal($identifier){
        return self::find()->where(['identifier' => $identifier])->sum('score');
    }
}
