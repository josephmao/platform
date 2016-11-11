<?php

namespace common\modules\basic\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "game_rank_total".
 *
 * @property integer $id
 * @property string $identifier
 * @property string $nickname
 * @property string $headimgurl
 * @property string $score
 * @property integer $rank_order
 * @property string $created_time
 */
class RankTotal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_rank_total';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rank_order'], 'integer'],
            [['created_time'], 'safe'],
            [['identifier', 'nickname', 'headimgurl', 'score'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identifier' => 'Identifier',
            'nickname' => 'Nickname',
            'headimgurl' => 'Headimgurl',
            'score' => 'Score',
            'rank_order' => 'Rank Order',
            'created_time' => 'Created Time',
        ];
    }

    public static function getDataProvider($date){
        $data = self::find()->limit(10)->orderBy('score DESC')->all();

        $array = [];
        if(!empty($data)){
            $index = 1;
            foreach($data as $row){
                $array[$index] = $row->rank_date;
                $index++;
            }
        }

        return $array;
    }


    public static function getRankByIdentifier($identifier){
        return self::find()->where(['identifier' => $identifier])->one();
    }

    public static function getOrder($identifier){
        $model = self::find()->where(['identifier' => $identifier])->one();
        return isset($model->rank_order)?$model->rank_order:0;
    }
}
