<?php

namespace app\modules\yangiliklar\models;

use Yii;

/**
 * This is the model class for table "kocha".
 *
 * @property int $id
 * @property string $nomi
 * @property int $viloyat_id
 * @property int $tuman_id
 *
 * @property Axoli[] $axolis
 * @property Viloyat $viloyat
 * @property Tuman $tuman
 */
class Kocha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kocha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'viloyat_id', 'tuman_id'], 'required'],
            [['viloyat_id', 'tuman_id'], 'integer'],
            [['nomi'], 'string', 'max' => 30],
            [['viloyat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viloyat::className(), 'targetAttribute' => ['viloyat_id' => 'id']],
            [['tuman_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tuman::className(), 'targetAttribute' => ['tuman_id' => 'id']],
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
            'tuman_id' => 'Tuman ID',
        ];
    }

    /**
     * Gets query for [[Axolis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAxolis()
    {
        return $this->hasMany(Axoli::className(), ['kocha_id' => 'id']);
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
     * Gets query for [[Tuman]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTuman()
    {
        return $this->hasOne(Tuman::className(), ['id' => 'tuman_id']);
    }
}
