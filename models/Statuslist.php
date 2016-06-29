<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 16:33
 */

namespace app\models;


use yii\db\ActiveRecord;

class Statuslist extends ActiveRecord
{
    public static function tableName()
    {
        return 'statuslist';
    }
}