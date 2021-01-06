<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tuman".
 *
 * @property int $id
 * @property string $nomi
 * @property int $viloyat_id
 *
 * @property Axoli[] $axolis
 * @property Kocha[] $kochas
 * @property Viloyat $viloyat
 */
class Tuman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tuman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'viloyat_id'], 'required'],
            [['viloyat_id'], 'integer'],
            [['nomi'], 'string', 'max' => 30],
            [['viloyat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viloyat::className(), 'targetAttribute' => ['viloyat_id' => 'id']],
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
            'viloyat_id' => 'Viloyat ID',
        ];
    }

    /**
     * Gets query for [[Axolis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAxolis()
    {
        return $this->hasMany(Axoli::className(), ['shaxar_id' => 'id']);
    }

    /**
     * Gets query for [[Kochas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKochas()
    {
        return $this->hasMany(Kocha::className(), ['tuman_id' => 'id']);
    }

    /**
     * Gets query for [[Viloyat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViloyat()
    {
        return $this->hasOne(Viloyat::className(), ['id' => 'viloyat_id']);
    }
}
