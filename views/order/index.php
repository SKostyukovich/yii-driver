<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;


$dataProvider = new ActiveDataProvider([
                                           'query'      => $query,
                                           'pagination' => [
                                               'pageSize' => 5,
                                           ],
                                       ]);
echo GridView::widget([
                          'dataProvider' => $dataProvider,
                          'columns'      => [
                              ['attribute' => 'id',
                               'header'    => '№'
                              ],

                              ['attribute' => 'route',
                               'header'    => 'Маршрут'
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
                              /* [
                                   'attribute' => 'users_description',
                                   'value' => function($data)
                                   {
                                       return ($data->userDescription->name. ' ' . $data->userDescription->surname );
                                   },
                                   'header' => 'Имя пользователя'
                               ]*/
                              ['attribute' => 'date',
                               'format'    => 'date',
                               'header'    => 'Дата'
                              ],
                              ['attribute' => 'time',
                               'format'    => 'time',
                               'header'    => 'Время'
                              ],

                          ]
                      ]);

?>
<div>
    <h2>Добавить заявку</h2>
    <?php
    $form = ActiveForm::begin([
                                  'id'      => 'common__login-form',
                                  'options' => [
                                      'class' => 'col-md-4',
                                  ],
                              ]); ?>
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'language' => 'ru',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
    ])->label('Дата поездки'); ?>
    <?= $form->field($model, 'time')->widget(TimePicker::className(),[
        'options' => ['placeholder' => 'ВВедите время'],
        'pluginOptions' => [
            'autoclose' => true,
            'showMeridian' => false


        ]
    ])->label('Время начала поездки'); ?>
    <?= $form->field($model, 'route')->textInput()->label('Маршрут'); ?>
    <?= $form->field($model, 'comment')->textarea()->label('Комментарий');?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>
</div>
