<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tashkilot".
 *
 * @property int $id
 * @property string $nomi
 * @property string $login
 * @property string $parol
 * @property int $ajratilgan_pul
 * @property int $yetkazilgan_pul
 *
 * @property Natija[] $natijas
 */
class Tashkilot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tashkilot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi', 'login', 'parol', 'ajratilgan_pul', 'yetkazilgan_pul'], 'required'],
            [['ajratilgan_pul', 'yetkazilgan_pul'], 'integer'],
            [['nomi'], 'string', 'max' => 40],
            [['login'], 'string', 'max' => 30],
            [['parol'], 'string', 'max' => 32],
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
            'login' => 'Login',
            'parol' => 'Parol',
            'ajratilgan_pul' => 'Ajratilgan Pul',
            'yetkazilgan_pul' => 'Yetkazilgan Pul',
        ];
    }

    /**
     * Gets query for [[Natijas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatijas()
    {
        return $this->hasMany(Natija::className(), ['tashkilot_id' => 'id']);
    }
}
