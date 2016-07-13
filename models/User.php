<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 10:56
 */

namespace app\models;

use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'users';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);  // TODO: Implement findIdentity() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getUserDescription()
    {
        return $this->hasOne(UserDescription::className(), ['users_id' => 'id']);
    }

}