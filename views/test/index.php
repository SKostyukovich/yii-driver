<?php
/**
 * @var $this  yii\web\View
 * @var $model app\models\Users
 **/
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'My Yii Application';
?>
<div class="index-login">
    <div class="col-md-4 col-md-offset-3">
        <?php $form = ActiveForm::begin([
                                            'id'      => 'login-form',
                                            'options' => ['class' => 'form-horizontal']
                                        ]); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => 'true',])->label('Имя пользователя'); ?>
        <?= $form->field($model, 'password')->passwordInput(['name' => 'пароль'])->label('Пароль'); ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>