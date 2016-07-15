<?php
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

?>
<div class="col-lg-12">
    <?php echo $gridView = GridView::widget(['dataProvider' => $dataProvider,
                                             'columns'      => [
                                                 'id',
                                                 [
                                                     'attribute' => 'username',
                                                     'label'     => 'Имя название учетной записи'
                                                 ],
                                                 [
                                                     'attribute' => 'created_at',
                                                     'format'    => 'date',
                                                     'label'     => 'Зарегистрирован'
                                                 ],
                                                 [
                                                     'value' => function ($model) {
                                                         return $model->userDescription->phone;
                                                     },
                                                     'label' => 'Телефон'
                                                 ],
                                                 [
                                                     'value' => function ($model) {
                                                         return $model->userDescription->email;
                                                     },
                                                     'label' => 'Email'
                                                 ],
                                                 [
                                                     'value' => function ($model) {
                                                         return $model->userDescription->name . ' ' . $model->userDescription->surname;
                                                     },
                                                     'label' => 'ФИО',
                                                 ]
                                             ]
                                            ]);
    ?>
</div>
<div class="col-lg-4">
    <label> Добавить нового пользователя</label>
    <?php $form = ActiveForm::begin(['id' => 'user-login-form']); ?>
    <?= $form->field($model, 'username')->textInput()->label('Логин'); ?>
    <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>
    <p>Информация о пользователе</p>
    <?= $form->field($userDescription, 'name')->textInput()->label('Имя'); ?>
    <?= $form->field($userDescription, 'surname')->textInput()->label('Фамилий') ?>
    <?= $form->field($userDescription, 'department')->textInput()->label('Отдел') ?>
    <?= $form->field($userDescription, 'phone')->textInput()->label('Телефон') ?>
    <?= $form->field($userDescription, 'email')->textInput()->label('Email') ?>
    <?php echo \yii\bootstrap\Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    <?php $form::end(); ?>
</div>

