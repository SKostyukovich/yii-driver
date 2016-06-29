<?php


namespace app\controllers;

use app\models\LoginForm;
use yii\base\Controller;
use app\models\User;

class CommonController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->identity) {
            return $this->render('index');
        }
        return $this->actionLogin();
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->actionIndex();
    }
}
