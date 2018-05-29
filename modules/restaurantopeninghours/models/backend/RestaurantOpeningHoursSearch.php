<?php

namespace app\modules\restaurantopeninghours\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RestaurantOpeningHours;

/**
 * RestaurantOpeningHoursSearch represents the model behind the search form of `app\models\RestaurantOpeningHours`.
 */
class RestaurantOpeningHoursSearch extends RestaurantOpeningHours
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'restaurant_id', 'day_of_week'], 'integer'],
            [['time_open', 'time_closed'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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
        $query = RestaurantOpeningHours::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'restaurant_id' => $this->restaurant_id,
            'day_of_week' => $this->day_of_week,
            'time_open' => $this->time_open,
            'time_closed' => $this->time_closed,
        ]);

        return $dataProvider;
    }
}
