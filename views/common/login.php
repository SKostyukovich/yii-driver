<?php
/**
 * @var $model = app\models\User
 * Форма дял входа в систему,
 * controller => app\controllers\CommonController,
 * action => actionIndex()
 **/
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
    <div class="jumbotron">
        <p>Для использования системы необходимо пройти авторизацию</p>
        <p>Если у вас нет данных, нажмите на кнопку</p>
        <p><a class="btn btn-success btn-lg" href="#" role="button">Получить доступ</a></p>
    </div>
<?php
$form = ActiveForm::begin([
                              'id'      => 'common__login-form',
                              'options' => [
                                  'class' => 'col-md-4 col-md-offset-4',
                              ],
                          ]); ?>
<?= $form->field($model, 'username')->textInput()->label('Имя пользователя'); ?>
<?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

<?=
Html::submitButton('Войти', ['class' => 'btn btn-primary']);
ActiveForm::end();
?>