<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title ='活动用户';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-default-index">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'headimgurl',
                'label' => '头像',
                'format' => 'raw',
                'value' => function($model){
                    return Html::img($model->headimgurl, ['class' => 'img-thumbnail img-responsive', 'style' => 'width:60px;', 'alt' => base64_decode($model->nickname), 'title' => base64_decode($model->nickname)]);
                }
            ],
            [
                'attribute' => 'nickname',
                'label' => '昵称',
                'value' => function($model){
                    return base64_decode($model->nickname);
                }
            ],
            [
                'attribute' => 'sex',
                'label' => '性别',
                'value' => function($model){
                    return $model->sex == 1 ? '男' : '女';
                }
            ],
            'country',
            'province',
            'city',
            'real_name',
            'phone',
            [
                'attribute' => 'created_time',
                'label' => '创建日期',
            ]    
        ],
        'tableOptions' => [
            'class'=>'table table-responsive table-condensed table-hover'
        ],
    ]); ?>
    </p>
</div>