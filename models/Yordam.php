<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yordam".
 *
 * @property int $id
 * @property string $nomi
 * @property string $qisqacha
 *
 * @property Natija[] $natijas
 */
class Yordam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yordam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'qisqacha'], 'required'],
            [['qisqacha'], 'string'],
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
            'qisqacha' => 'Qisqacha',
        ];
    }

    /**
     * Gets query for [[Natijas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatijas()
    {
        return $this->hasMany(Natija::className(), ['tur_id' => 'id']);
    }
}
