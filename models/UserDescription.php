<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 17:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class UserDescription extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_description';
    }
}