<?php

namespace app\modules\yangiliklar\models;

use Yii;

/**
 * This is the model class for table "yangiliklar".
 *
 * @property int $id
 * @property int $b_id
 * @property int $m_id
 * @property string $nomi
 * @property string $matni
 * @property string $vaqti
 * @property int|null $yoqdi
 * @property int|null $yoqmadi
 * @property int|null $korishlarsoni
 */
class Yangiliklar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yangiliklar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['b_id', 'm_id', 'yoqdi', 'yoqmadi', 'korishlarsoni'], 'integer'],
            [['nomi', 'matni', 'vaqti'], 'required'],
            [['matni'], 'string'],
            [['vaqti'], 'safe'],
            [['nomi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'b_id' => 'B ID',
            'm_id' => 'M ID',
            'nomi' => 'Nomi',
            'matni' => 'Matni',
            'vaqti' => 'Vaqti',
            'yoqdi' => 'Yoqdi',
            'yoqmadi' => 'Yoqmadi',
            'korishlarsoni' => 'Korishlarsoni',
        ];
    }
}
