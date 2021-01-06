<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Axoli;

/**
 * AxoliSearch represents the model behind the search form of `app\models\Axoli`.
 */
class AxoliSearch extends Axoli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jinsi', 'kocha_id', 'viloyat_id', 'shaxar_id', 'nogironligi', 'chin_yetim', 'yetim', 'ishsiz', 'boquvchisiz', 'uysiz', 'farzandlari'], 'integer'],
            [['fio', 'tavallud_sanasi'], 'safe'],
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
        $query = Axoli::find();

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
            'jinsi' => $this->jinsi,
            'tavallud_sanasi' => $this->tavallud_sanasi,
            'kocha_id' => $this->kocha_id,
            'viloyat_id' => $this->viloyat_id,
            'shaxar_id' => $this->shaxar_id,
            'nogironligi' => $this->nogironligi,
            'chin_yetim' => $this->chin_yetim,
            'yetim' => $this->yetim,
            'ishsiz' => $this->ishsiz,
            'boquvchisiz' => $this->boquvchisiz,
            'uysiz' => $this->uysiz,
            'farzandlari' => $this->farzandlari,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio]);

        return $dataProvider;
    }
}
