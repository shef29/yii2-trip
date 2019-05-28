<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchTrip represents the model behind the search form of `app\models\Trip`.
 */
class SearchTrip extends Trip
{
    public $airport;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['airport'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Trip::find()
            ->select('*')
            ->innerJoin(TripService::tableName(), "trip.id = trip_service.trip_id")
            ->innerJoin(AirportName::tableName(), "trip_service.start_point_id = airport_name.airport_id")
            ->where(['corporate_id' => 3, 'trip_service.service_id' => 2])
            ->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'value', $this->airport]);

        return $dataProvider;
    }
}
