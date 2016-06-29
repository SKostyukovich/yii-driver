<?php


namespace app\controllers;
use app\models\User;
use yii\base\Controller;


class UserController extends Controller
{
    public function actionAddorder()
    {
        \Yii::$app->user->login(User::findIdentity(4));
        if (\Yii::$app->user->can('createPost')) {
           return $this->render('logged_success',['user' => \Yii::$app->user->getId()]);
        } else {
            return $this->render('logged_fail');
        }
    }
}