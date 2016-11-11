<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title ='总排行榜';
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
                    return Html::img($model['headimgurl'], ['class' => 'img-thumbnail img-responsive', 'style' => 'width:60px;', 'alt' => $model['nickname'], 'title' => $model['nickname']]);
                }
            ],
            'score',
            'nickname',
            'real_name',
            'phone',  
        ],
        'tableOptions' => [
            'class'=>'table table-responsive table-condensed table-hover'
        ],
    ]); ?>
    </p>
</div>