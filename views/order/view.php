<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */


?>
<div class="order-view">
    <h1><?=Html::encode($this->title);?></h1>

    <?=  DetailView::widget(['model' => $model,
        'attributes'=>[
            'id',
            'status',
            'route',
            [
                'attribute' => 'status',
                'value' => $model->statuslist->description
            ]
        ]]);
?>
</div>
