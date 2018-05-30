<?php

namespace app\modules\restaurants\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restaurants;

/**
 * RestaurantsSearch represents the model behind the search form of `app\models\Restaurants`.
 */
class RestaurantsSearch extends Restaurants
{
    public $restaurant_opening_hours_day_of_week, $restaurant_opening_hours_time_open, $restaurant_opening_hours_time_closed;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
            [['restaurant_opening_hours_day_of_week', 'restaurant_opening_hours_time_open', 'restaurant_opening_hours_time_closed'], 'safe'],
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
        $query = Restaurants::find()->joinWith(['restaurantOpeningHours']);

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        $query->andFilterWhere(['=', 'restaurant_opening_hours.day_of_week', $this->restaurant_opening_hours_day_of_week]);
        $query->andFilterWhere(['like', 'restaurant_opening_hours.time_open', $this->restaurant_opening_hours_time_open]);
        $query->andFilterWhere(['like', 'restaurant_opening_hours.time_closed', $this->restaurant_opening_hours_time_closed]);

        return $dataProvider;
    }
}
