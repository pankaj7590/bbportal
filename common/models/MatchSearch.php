<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Match;

/**
 * MatchSearch represents the model behind the search form about `common\models\Match`.
 */
class MatchSearch extends Match
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'round', 'tournament_id', 'pool_id', 'first_team_id', 'second_team_id', 'toss_winning_team_id', 'choice', 'winning_team_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['uniqueid', 'refree_name', 'scorer_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Match::find();

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
            'round' => $this->round,
            'tournament_id' => $this->tournament_id,
            'pool_id' => $this->pool_id,
            'first_team_id' => $this->first_team_id,
            'second_team_id' => $this->second_team_id,
            'toss_winning_team_id' => $this->toss_winning_team_id,
            'choice' => $this->choice,
            'winning_team_id' => $this->winning_team_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'uniqueid', $this->uniqueid])
            ->andFilterWhere(['like', 'refree_name', $this->refree_name])
            ->andFilterWhere(['like', 'scorer_name', $this->scorer_name]);

        return $dataProvider;
    }
}
