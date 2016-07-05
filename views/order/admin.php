<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
$dataProvider = new ActiveDataProvider([
                                           'query'      => $query,
                                           'pagination' => [
                                               'pageSize' => 10,
                                           ],
                                       ]);
echo Gridview::widget(
    ['dataProvider' => $dataProvider,
     'layout'       => "{items}",
     'columns'      => [
         [
             'class'  => 'yii\grid\SerialColumn',
             'header' => '№'
         ],
         [
             'attribute' => 'route',
             'header'    => 'Маршрут',
         ],
         [
             'attribute' => 'start',
             'format'    => 'date',
             'header'    => 'начало'
         ],
         [
             'value'  => function ($data) {
                 return $data->userDescription->name . ' ' . $data->userDescription->surname;
             },
             'header' => 'Заказчик'

         ],
         [
             'value'  => function ($data) {
                 return $data->userDescription->department;
             },
             'header' => 'Отдел'
         ],
         ['attribute'      => 'status',
          'value'          => function ($data) {
              return $data->statuslist->description;
          },
          'header'         => 'Статус',
          'contentOptions' => function ($model) {
              switch ($model->statuslist->getAttribute('id')) {
                  case 3:
                      return ['class' => 'warning'];
                      break;
                  case 2:
                      return ['class' => 'danger'];
                      break;
                  case 1:
                      return ['class' => 'success'];
                      break;
                  default:
                      return [];
              }
          }
         ],
         [
             'class'         => 'yii\grid\ActionColumn',
             'header'        => 'Действия',
             'headerOptions' => ['width' => '80'],
             'template'      => '{view} {update} {delete} {link}',
         ],
     ]
    ]
);
Modal::begin([
                 'header' => '<h2>Hello world</h2>',
                 'toggleButton' => ['label' => 'click me'],
             ]);

echo 'Say hello...';

Modal::end();
