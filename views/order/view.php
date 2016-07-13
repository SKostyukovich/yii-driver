<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */


?>
<div class="order-view col-lg-6" >
    <h1><?= Html::encode($this->title); ?></h1>

    <?= DetailView::widget(['model'      => $model,
                            'attributes' => [
                                [
                                    'attribute' => 'id',
                                    'label'     => 'Номер заказа'
                                ],
                                [
                                    'attribute' => 'date',
                                    'label'     => 'Дата',
                                    'format'    => 'date'
                                ],
                                [
                                    'attribute' => 'time',
                                    'label'     => 'Время',
                                    'format'    => 'time',
                                ],
                                [
                                    'value' => $model->userDescription->department,
                                    'label' => 'Отдел'
                                ],
                                [
                                    'value' => $model->userDescription->name . ' ' . $model->userDescription->surname,
                                    'label' => 'ФИО'
                                ],
                                [
                                    'value' => $model->drivers->name .' '.$model->drivers->surname,
                                    'label' => 'Водитель'
                                ],
                                [
                                    'value' => $model->statuslist->description,
                                    'label' => 'Статус'
                                ],
                                [
                                    'value' => $model->userDescription->phone,
                                    'label' => 'Телефон'
                                ],
                                [
                                    'value' => $model->userDescription->email,
                                    'label' => 'Email'
                                ],
                            ]
                           ]);
?>
</div>
