<?php
/**
 * Created by PhpStorm.
 * User: skostyukovich
 * Date: 11.07.2016
 * Time: 10:24
 */

namespace app\models;


use yii\data\ActiveDataProvider;
use yii\base\Model;

class OrderSearch extends Order
{
    public $department;
    public function rules()
    {
        // только поля определенные в rules() будут доступны для поиска
        return [
            [['id', 'status','route','date','department'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find()->joinWith('userDescription')->joinWith('statuslist');
        $dataProvider = new ActiveDataProvider(['query' => $query,
                                               'pagination' => ['pageSize' => 10]]);

        if (!($this->load($params) && $this->validate())) {
            $query->addOrderBy('status desc');
            return $dataProvider;
        }

        $query->andFilterWhere(['orders.id' => $this->id]);
        $query->andFilterWhere(['status' => $this->status]);
        $query->andFilterWhere(['route'=> $this->route]);
        $query->andFilterWhere(['date'=> $this->date]);
        $query->andFilterWhere(['department' => $this->department]);

        return $dataProvider;

    }
}