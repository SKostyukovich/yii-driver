<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 29.06.2016
 * Time: 14:24
 */

namespace app\controllers;

use app\models\Order;
use app\models\OrderForm;
use yii\web\Controller;
use app\models\Driver;
use app\models\Statuslist;
use app\models\Car;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{
    public function actionTest()
    {
        if (\Yii::$app->user->can('createPost')) {
            return $this->actionAdmin();
        }
        $model = new OrderForm();
        if ($model->load(\Yii::$app->request->post())) {
            $model->users_id = \Yii::$app->user->id;
            $model->status = 3;
            $model->save();
            $this->redirect('?r=order/test');
        }

        if ($query = Order::find()->where([
                                              'users_id' => \Yii::$app->user->id
                                          ])
        ) {
            return $this->render('index', [
                'model' => $model,
                'query' => $query
            ]);
        }
        return $this->redirect('?r=common/index');
    }

    public function actionUpdate()
    {

        if ($model = Order::find()->where(['id' => \Yii::$app->request->get('id')])->one()) {
            $drivers = Driver::find()->all();
            $statusList = Statuslist::find()->all();
            $cars = Car::find()->all();
            if ($model->load(\Yii::$app->request->post())) {
                $model->save();
                return $this->actionTest();
            }
            return $this->render('update', [
                'model'      => $model,
                'statusList' => $statusList,
                'drivers'    => $drivers,
                'cars'       => $cars,
            ]);
        }
        throw new NotFoundHttpException;

    }

    public function actionDelete()
    {
        $model = Order::findOne(['id' => \Yii::$app->request->get('id')]);
        $model->delete();
        $this->redirect('/?r=order/test');
    }

    public function actionAdmin()
    {
        $model = new Order;
        if ($query = Order::find()) {
            return $this->render('admin', [
                'query' => $query,
                'model' => $model
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}