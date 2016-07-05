<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 14:32
 */

namespace app\models;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
    public function rules()
    {
        return [
            [['route','drivers_id', 'status', 'cars_id'], 'required']
        ];
    }

    public function getUserDescription()
    {
        return $this->hasOne(UserDescription::className(),['users_id'=>'users_id']);
    }
           
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'users_id']);
    }

    public function getStatuslist()
    {
        return $this->hasOne(Statuslist::className(), ['id' => 'status']);
    }

    public function getDrivers()
    {
        return $this->hasOne(Driver::className(), ['id' => 'drivers_id']);
    }
}