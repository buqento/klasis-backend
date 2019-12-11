<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "renungan".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $ayat
 * @property string $perikop
 * @property string $konten
 * @property string $created_at
 */
class Renungan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'renungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'ayat', 'perikop', 'konten'], 'required'],
            [['tanggal', 'created_at'], 'safe'],
            [['perikop', 'konten'], 'string'],
            [['ayat'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'ayat' => 'Ayat',
            'perikop' => 'Perikop',
            'konten' => 'Konten',
            'created_at' => 'Created At',
        ];
    }
}
