<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tashkilot;

/**
 * TashkilotSearch represents the model behind the search form of `app\models\Tashkilot`.
 */
class TashkilotSearch extends Tashkilot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ajratilgan_pul', 'yetkazilgan_pul'], 'integer'],
            [['nomi', 'login', 'parol'], 'safe'],
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
        $query = Tashkilot::find();

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
            'ajratilgan_pul' => $this->ajratilgan_pul,
            'yetkazilgan_pul' => $this->yetkazilgan_pul,
        ]);

        $query->andFilterWhere(['like', 'nomi', $this->nomi])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'parol', $this->parol]);

        return $dataProvider;
    }
}
