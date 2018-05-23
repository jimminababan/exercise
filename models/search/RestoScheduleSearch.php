<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RestoSchedule;

/**
 * RestoScheduleSearch represents the model behind the search form of `app\models\RestoSchedule`.
 */
class RestoScheduleSearch extends RestoSchedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resto_schedule'], 'integer'],
            [['resto_name', 'resto_open_time'], 'safe'],
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
        $query = RestoSchedule::find();

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
            'resto_schedule' => $this->resto_schedule,
        ]);

        $query->andFilterWhere(['like', 'resto_name', $this->resto_name])
            ->andFilterWhere(['like', 'resto_open_time', $this->resto_open_time]);

        return $dataProvider;
    }
}
