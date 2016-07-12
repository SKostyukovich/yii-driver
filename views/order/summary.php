<?php
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

foreach ($queries as $query) {
    $dataProvider = new ActiveDataProvider([
                                               'query'      => $query,
                                               'pagination' => [
                                                   'pageSize' => 5,
                                               ],
                                           ]);
    echo GridView::widget(['dataProvider'=> $dataProvider]);
}