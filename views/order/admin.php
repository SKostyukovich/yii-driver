<?php
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\export\ExportMenu;
use yii\helpers\Html;

$columnsGrid = [
    [
        'class'  => 'yii\grid\SerialColumn',
        'header' => '№'
    ],
    [
        'attribute' => 'route',
        'header'    => 'Маршрут',
    ],
    [
        'attribute' => 'date',
        'format'    => 'date',
        'header'    => 'Дата'
    ],
    [
        'attribute' => 'time',
        'format'    => 'time',
        'header'    => 'Время'
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
        'buttons'       => [
            'update' => function ($url) {
                return Html::a('<span style="color:orange" class="glyphicon glyphicon-pencil"></span>', $url);
            },
            'view'   => function ($url) {
                return Html::a('<span style="color:green" class="glyphicon glyphicon-eye-open"></span>', $url);
            },
            'delete' => function($url) {
                return Html::a('<span style="color:red" class="glyphicon glyphicon-trash"></span>', $url);
            }
        ],
    ],
];
$dataProvider = new ActiveDataProvider([
                                           'query'      => $query,
                                           'pagination' => [
                                               'pageSize' => 15,
                                           ],
                                       ]);
echo GridView::widget(
    ['dataProvider' => $dataProvider,
     'layout'       => "{items}\n{pager}",
     'columns'      => $columnsGrid
    ]
);

echo ExportMenu::widget([
                            'dataProvider'    => $dataProvider,
                            'columns'         => $columnsGrid,
                            'fontAwesome'     => true,
                            'dropdownOptions' => [
                                'label' => 'Экспорт',
                                'class' => 'btn btn-default'
                            ],
                        ]);
