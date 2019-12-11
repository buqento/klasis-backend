<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class Biodata extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'golongan_id', 'pendidikan_id', 'alamat', 'cacat_id', 'jemaat_id', 'sektor_id', 'unit_id', 'status_pernikahan', 'status_hidup', 'status_baptis', 'status_sidi', 'pekerjaan_id'], 'required'],
            [['tanggal_lahir', 'created_at'], 'safe'],
            [['pendidikan_id', 'jemaat_id', 'sektor_id', 'unit_id', 'status_pernikahan', 'status_hidup', 'status_baptis', 'status_sidi', 'pekerjaan_id'], 'integer'],
            ['nama', 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'golongan_id' => 'Golongan Darah',
            'pendidikan_id' => 'Pendidikan Terakhir',
            'alamat' => 'Alamat',
            'cacat_id' => 'Cacat Tubuh',
            'jemaat_id' => 'Nama Jemaat',
            'sektor_id' => 'Nama Sektor',
            'unit_id' => 'Nama Unit',
            'status_pernikahan' => 'Status Pernikahan',
            'status_hidup' => 'Status Hidup',
            'status_baptis' => 'Status Baptis',
            'status_sidi' => 'Status Sidi',
            'pekerjaan_id' => 'Pekerjaan',
            'created_at' => 'Created At',
        ];
    }

    public function getGolongan()
    {
        return $this->hasOne(Golongan::className(), ['id' => 'golongan_id']);
    }

    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'pendidikan_id']);
    }

    public function getCacat()
    {
        return $this->hasOne(Cacat::className(), ['id' => 'cacat_id']);
    }

    public function getPekerjaan()
    {
        return $this->hasOne(Pekerjaan::className(), ['id' => 'pekerjaan_id']);
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getSektor()
    {
        return $this->hasOne(Sektor::className(), ['id' => 'sektor_id']);
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

}
