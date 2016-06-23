<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\base\Controller;
use app\models\User;

class TestController extends Controller
{


    public function actionIndex()
    {
        //рендер главной страницы
        $model = new User();
        return $this->render('index',['model' => $model]);

    }

    public function actionLogin()
    {
        echo 'login is allowed';
    }
    public function actionSignup()
    {
        echo 'signup is allowed';
    }
    public function actionLogout()
    {
        echo 'logout is denied';
    }
}