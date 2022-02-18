<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assets;

/**
 * AssetsSearch represents the model behind the search form of `backend\models\Assets`.
 */
class AssetsSearch extends Assets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_id'], 'integer'],
            [['asset_name', 'asset_description', 'created_at'], 'safe'],
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
        $query = Assets::find();

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
            'asset_id' => $this->asset_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'asset_name', $this->asset_name])
            ->andFilterWhere(['like', 'asset_description', $this->asset_description]);

        return $dataProvider;
    }
}
