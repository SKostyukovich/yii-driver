<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 30.06.2016
 * Time: 10:22
 */

namespace app\models;


use yii\db\ActiveRecord;

class OrderForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
    public function rules()
    {
       return [[['route','start'],'required']];
    }
}