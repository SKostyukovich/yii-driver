<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 13.07.2016
 * Time: 11:21
 */

namespace app\controllers;

use app\models\UserDescription;
use app\models\UserForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => ['author']
                    ]
                ],
            ]
        ];
    }

    /**
     * @return app/views/admin/index.php
     * @throws \yii\base\Exception
     */
    public function actionIndex()
    {
        $model = new UserForm();
        $userDescription = new UserDescription();
        if ($model->load(\Yii::$app->request->post())) {
            $userDescription->load(\Yii::$app->request->post());
            $model->password = \Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->save();
            $userDescription->link('users',$model);
            $userDescription->save();
            return $this->redirect('?r=admin/index');
        }
        $query = UserForm::find()->joinWith('userDescription');
        $dataProvider = new ActiveDataProvider(['query' => $query,
                                               ]);
        return $this->render('index', ['dataProvider' => $dataProvider, 'model' => $model, 'userDescription' => $userDescription]);

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = UserForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Такая страница не существует');
        }
    }
}