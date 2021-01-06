<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kocha;

/**
 * KochaSearch represents the model behind the search form of `app\models\Kocha`.
 */
class KochaSearch extends Kocha
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viloyat_id', 'tuman_id'], 'integer'],
            [['nomi'], 'safe'],
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
        $query = Kocha::find();

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
            'viloyat_id' => $this->viloyat_id,
            'tuman_id' => $this->tuman_id,
        ]);

        $query->andFilterWhere(['like', 'nomi', $this->nomi]);

        return $dataProvider;
    }
}
