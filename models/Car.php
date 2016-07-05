<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 05.07.2016
 * Time: 10:55
 */

namespace app\models;



use yii\db\ActiveRecord;

class Car extends ActiveRecord
{
    public static function tableName()
    {
        return 'cars';
    }
}