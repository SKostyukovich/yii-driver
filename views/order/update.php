<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;

$driver_items = ArrayHelper::map($drivers, 'id', 'surname');
$status_items = ArrayHelper::map($statusList, 'id', 'description');
$cars_items = ArrayHelper::map($cars, 'id', 'name');
switch ($model->status) {
    case '1':
        $statusClass = 'form-control btn-success';
        break;
    case '2':
        $statusClass = 'form-control btn-danger';
        break;
    case '3':
        $statusClass = 'form-control btn-warning';
        break;
}
$form = ActiveForm::begin([
                              'id'      => 'common__login-form',
                              'options' => [
                                  'class' => 'col-md-4 col-md-offset-4',
                              ],
                          ]); ?>

<?= $form->field($model, 'route')->textInput()->label('Маршрут'); ?>
<?= $form->field($model, 'drivers_id')->dropDownList($driver_items)->label('Выбор водителя'); ?>
<?= $form->field($model, 'status')->dropDownList($status_items,
                                                 ['class' => $statusClass])->label('Состояние заказа'); ?>
<?= $form->field($model, 'cars_id')->dropDownList($cars_items)->label('Автомобиль'); ?>
<?= $form->field($model, 'source')->textInput()->label('Основание') ?>
<?= Html::submitButton('отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
