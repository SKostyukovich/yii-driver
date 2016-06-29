<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 14:24
 */

namespace app\controllers;

use app\models\Order;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionTest()
    {
        if ($query =  Order::find())
        {
           return $this->render('index', ['query' => $query]);
        }
    }
}