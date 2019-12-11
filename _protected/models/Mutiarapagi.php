<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mutiara_pagi".
 *
 * @property int $id
 * @property string $tanggal_tampil
 * @property string $konten
 * @property string $created_at
 */
class Mutiarapagi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mutiara_pagi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_tampil', 'konten'], 'required'],
            [['tanggal_tampil', 'created_at'], 'safe'],
            [['konten'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal_tampil' => 'Tanggal Tampil',
            'konten' => 'Konten',
            'created_at' => 'Created At',
        ];
    }
}
