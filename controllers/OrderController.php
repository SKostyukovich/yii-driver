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
use app\models\OrderSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Driver;
use app\models\Statuslist;
use app\models\Car;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can('createPost')) {
            return $this->actionAdmin();
        }
        $model = new OrderForm();
        if ($model->load(\Yii::$app->request->post())) {
            $model->users_id = \Yii::$app->user->id;
            $model->status = 3;
            $model->save();
            $this->redirect('?r=order/index');
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

    public function actionUpdate($id)
    {

        if ($model = $this->findModel($id)) {
            $drivers = Driver::find()->all();
            $statusList = Statuslist::find()->all();
            $cars = Car::find()->all();
            if ($model->load(\Yii::$app->request->post())) {
                $model->save();
                return $this->actionIndex();
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

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        $this->redirect('/?r=order/index');
    }

    public function actionAdmin()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        return $this->render('admin', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSummary()
    {
        $cars = ArrayHelper::map(Car::find()->all(), 'id', 'name');
        foreach ($cars as $key => $car) {
            $queries[] = Order::find()->where(['cars_id' => $key]);
        }
        if (!empty($queries)) {
            return $this->render('summary', ['queries' => $queries]);
        }
    }

    public function actionSuspend($id)
    {
        $model = Order::findOne($id);
        $model->status = 4;
        $model->save();
        $message = \Yii::$app->mailer->compose();
        $message->setFrom('s.kostyukovich@nekrasovka.ru')->setTo('s.kostyukovich@gmail.com')->setSubject('test_theme')->setTextBody('test')->send();
        return $this->actionIndex();
    }

    public function actionHash()
    {
        $hash = \Yii::$app->getSecurity()->generatePasswordHash('testpassword2');
        var_dump($hash);
    }
}