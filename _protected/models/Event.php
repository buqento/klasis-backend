<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $jemaat_id
 * @property string $judul
 * @property string $tanggal_jam
 * @property string $tempat
 * @property string $keterangan
 * @property string $created_at
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'judul', 'tanggal_jam', 'tempat', 'keterangan'], 'required'],
            [['jemaat_id'], 'integer'],
            [['tanggal_jam', 'created_at'], 'safe'],
            [['judul'], 'string', 'max' => 200],
            [['tempat'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jemaat_id' => 'Nama Jemaat',
            'judul' => 'Judul Event',
            'tanggal_jam' => 'Tanggal & Jam',
            'tempat' => 'Tempat',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
        ];
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }
}
