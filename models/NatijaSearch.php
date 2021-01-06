<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Natija;

/**
 * NatijaSearch represents the model behind the search form of `app\models\Natija`.
 */
class NatijaSearch extends Natija
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mablag', 'axoli_id', 'tashkilot_id', 'tur_id', 'bajarildi'], 'integer'],
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
        $query = Natija::find();

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
            'mablag' => $this->mablag,
            'axoli_id' => $this->axoli_id,
            'tashkilot_id' => $this->tashkilot_id,
            'tur_id' => $this->tur_id,
            'bajarildi' => $this->bajarildi,
        ]);

        return $dataProvider;
    }
}
