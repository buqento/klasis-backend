<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ibadah".
 *
 * @property int $id
 * @property int $pelayan_id
 * @property int $gereja_id
 * @property string $waktu
 * @property string $deskripsi
 * @property string $created_at
 */
class Ibadah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ibadah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pelayan_id', 'gereja_id', 'waktu', 'deskripsi'], 'required'],
            [['pelayan_id', 'gereja_id'], 'integer'],
            [['created_at'], 'safe'],
            [['waktu', 'deskripsi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pelayan_id' => 'Pelayan Ibadah',
            'gereja_id' => 'Nama Gereja',
            'waktu' => 'Waktu',
            'deskripsi' => 'Deskripsi',
            'created_at' => 'Created At',
        ];
    }

    public function getGereja()
    {
        return $this->hasOne(Gereja::className(), ['id' => 'gereja_id']);
    }

    public function getPendeta()
    {
        return $this->hasOne(Biodatapendeta::className(), ['id' => 'pelayan_id']);
    }

}
