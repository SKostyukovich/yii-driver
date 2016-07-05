<?php


namespace app\controllers;

use app\models\LoginForm;
use yii\web\Controller;
use app\models\User;

class CommonController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->identity) {
            $this->redirect('?r=order/test');
        }
        return $this->actionLogin();
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            $this->redirect('?r=order/test');
        }
        return $this->render('login', ['model' => $model]);
    }
    
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->actionIndex();
    }
}
