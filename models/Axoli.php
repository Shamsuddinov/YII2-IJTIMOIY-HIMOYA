<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "axoli".
 *
 * @property int $id
 * @property string $fio
 * @property int $jinsi
 * @property string $tavallud_sanasi
 * @property int $kocha_id
 * @property int $viloyat_id
 * @property int $shaxar_id
 * @property int $nogironligi
 * @property int $chin_yetim
 * @property int $yetim
 * @property int $ishsiz
 * @property int $boquvchisiz
 * @property int $uysiz
 * @property int $farzandlari
 *
 * @property Kocha $kocha
 * @property Tuman $shaxar
 * @property Viloyat $viloyat
 * @property Natija[] $natijas
 */
class Axoli extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'axoli';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'tavallud_sanasi', 'kocha_id', 'viloyat_id', 'shaxar_id', 'nogironligi', 'chin_yetim', 'yetim', 'ishsiz', 'boquvchisiz', 'uysiz', 'farzandlari'], 'required'],
            [['jinsi', 'kocha_id', 'viloyat_id', 'shaxar_id', 'nogironligi', 'chin_yetim', 'yetim', 'ishsiz', 'boquvchisiz', 'uysiz', 'farzandlari'], 'integer'],
            [['tavallud_sanasi'], 'safe'],
            [['fio'], 'string', 'max' => 255],
            [['kocha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kocha::className(), 'targetAttribute' => ['kocha_id' => 'id']],
            [['shaxar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tuman::className(), 'targetAttribute' => ['shaxar_id' => 'id']],
            [['viloyat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viloyat::className(), 'targetAttribute' => ['viloyat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID :',
            'fio' => 'FIO :',
            'jinsi' => 'Jinsi :',
            'tavallud_sanasi' => 'Tavallud sanasi :',
            'kocha_id' => 'Ko\'cha ID :',
            'viloyat_id' => 'Viloyat ID :',
            'shaxar_id' => 'Shaxar ID :',
            'nogironligi' => 'Nogironligi :',
            'chin_yetim' => 'Chin yetim :',
            'yetim' => 'Yetim :',
            'ishsiz' => 'Ishsiz :',
            'boquvchisiz' => 'Boquvchisiz :',
            'uysiz' => 'Uysiz :',
            'farzandlari' => 'Farzandlari :',
        ];
    }

    /**
     * Gets query for [[Kocha]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKocha()
    {
        return $this->hasOne(Kocha::className(), ['id' => 'kocha_id']);
    }

    /**
     * Gets query for [[Shaxar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShaxar()
    {
        return $this->hasOne(Tuman::className(), ['id' => 'shaxar_id']);
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

    /**
     * Gets query for [[Natijas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatijalar()
    {
        return $this->hasMany(Natija::className(), ['axoli_id' => 'id']);
    }
}
