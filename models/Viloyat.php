<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viloyat".
 *
 * @property int $id
 * @property string $nomi
 *
 * @property Axoli[] $axolis
 * @property Kocha[] $kochas
 * @property Tuman[] $tumen
 */
class Viloyat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viloyat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi'], 'required'],
            [['nomi'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomi' => 'Nomi',
        ];
    }

    /**
     * Gets query for [[Axolis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAxolis()
    {
        return $this->hasMany(Axoli::className(), ['viloyat_id' => 'id']);
    }

    /**
     * Gets query for [[Kochas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKochas()
    {
        return $this->hasMany(Kocha::className(), ['viloyat_id' => 'id']);
    }

    /**
     * Gets query for [[Tumen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTumen()
    {
        return $this->hasMany(Tuman::className(), ['viloyat_id' => 'id']);
    }
}
