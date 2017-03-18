<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AssociationPlayer;

/**
 * AssociationPlayerSearch represents the model behind the search form about `common\models\AssociationPlayer`.
 */
class AssociationPlayerSearch extends AssociationPlayer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'association_id', 'player_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
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
    public function search($params, $association_id)
    {
        $query = AssociationPlayer::find()->where(['association_id' => $association_id]);

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
            'association_id' => $this->association_id,
            'player_id' => $this->player_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
