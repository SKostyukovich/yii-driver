<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class UserForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function getUserDescription()
    {
        return $this->hasOne(UserDescription::className(),['users_id'=>'id']);
    }
    public function behaviors()
    {
        return [
            'timestamp' =>[
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }
    public function rules()
    {
        return [
            [['username', 'password'], 'required']
        ];
    }
}