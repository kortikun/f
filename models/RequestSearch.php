<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Request;

/**
 * RequestSearch represents the model behind the search form of `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'request_status_id', 'client_id'], 'integer'],
            [['start_date', 'home_tech_type', 'home_tech_model', 'problem_description', 'completion_date'], 'safe'],
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
        $query = Request::find();

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
            'start_date' => $this->start_date,
            'request_status_id' => $this->request_status_id,
            'completion_date' => $this->completion_date,
            'client_id' => $this->client_id,
        ]);

        $query->andFilterWhere(['like', 'home_tech_type', $this->home_tech_type])
            ->andFilterWhere(['like', 'home_tech_model', $this->home_tech_model])
            ->andFilterWhere(['like', 'problem_description', $this->problem_description]);

        return $dataProvider;
    }
}
