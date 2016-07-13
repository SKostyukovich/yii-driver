<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 17:37
 */

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class UserDescription extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_description';
    }


    public function getUsers()
    {
        return $this->hasOne(UserForm::className(), ['id' => 'users_id']);
    }

    public function rules()
    {
        return [[
                    ['name', 'surname', 'phone', 'email', 'department'],
                    'safe'
                ]
        ];
    }
}

