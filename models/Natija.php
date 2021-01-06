<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "natija".
 *
 * @property int $id
 * @property int $mablag
 * @property int $axoli_id
 * @property int $tashkilot_id
 * @property int $tur_id
 * @property int $bajarildi
 *
 * @property Tashkilot $tashkilot
 * @property Axoli $axoli
 * @property Yordam $tur
 */
class Natija extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'natija';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mablag', 'axoli_id'], 'required'],
            [['mablag', 'axoli_id', 'tashkilot_id', 'tur_id', 'bajarildi'], 'integer'],
            [['tashkilot_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tashkilot::className(), 'targetAttribute' => ['tashkilot_id' => 'id']],
            [['axoli_id'], 'exist', 'skipOnError' => true, 'targetClass' => Axoli::className(), 'targetAttribute' => ['axoli_id' => 'id']],
            [['tur_id'], 'exist', 'skipOnError' => true, 'targetClass' => Yordam::className(), 'targetAttribute' => ['tur_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mablag' => 'Mablag',
            'axoli_id' => 'Axoli ID',
            'tashkilot_id' => 'Tashkilot ID',
            'tur_id' => 'Tur ID',
            'bajarildi' => 'Bajarildi',
        ];
    }

    /**
     * Gets query for [[Tashkilot]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTashkilot()
    {
        return $this->hasOne(Tashkilot::className(), ['id' => 'tashkilot_id']);
    }

    /**
     * Gets query for [[Axoli]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAxoli()
    {
        return $this->hasOne(Axoli::className(), ['id' => 'axoli_id']);
    }

    /**
     * Gets query for [[Tur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTur()
    {
        return $this->hasOne(Yordam::className(), ['id' => 'tur_id']);
    }
}
