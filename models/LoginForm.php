<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\User;

class LoginForm extends ActiveRecord
{
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute)
    {
        if( $this->password !== User::findOne(['username'=>$this->username])->password)
        {   
            $this->addError($attribute, 'неправильный пароль');
        }
    }

    public static function TableName()
    {
        return 'users';
    }

    public function login()
    {
        if ($this->validate()) {
           return  \Yii::$app->user->login(User::findIdentity(1), 3600*24*30);
        }
        return false;
    }
}