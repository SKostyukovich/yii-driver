<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
                                           'query'      => $query,
                                           'pagination' => [
                                               'pageSize' => 5,
                                           ],
                                       ]);
echo GridView::widget([
                          'dataProvider' => $dataProvider,
                          'columns'      => [
                              ['attribute' => 'id'],

                              ['attribute' => 'users',
                               'value'     => function ($data) {
                                   return $data->users->username;
                               },
                               'header'    => 'Имя пользователя'
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
                                       case 1:
                                           return ['class' => 'success'];
                                           break;
                                       case 2:
                                           return ['class' => 'danger'];
                                       default:
                                           return [];

                                   }


                               }

                              ]
                          ]
                      ]);
