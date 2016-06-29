<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 16:34
 */

namespace app\models;


use yii\db\ActiveRecord;

class Driver extends ActiveRecord
{
    public static function tableName()
    {
        return 'drivers';
    }
}