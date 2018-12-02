<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biodata_majelis".
 *
 * @property int $id
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jabatan
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string $foto
 * @property int $pendidikan_id
 * @property string $pekerjaan
 * @property string $keterangan
 * @property int $status_aktif
 * @property int $jenis_kelamin
 * @property string $created_at
 */
class BiodataMajelis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata_majelis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'jabatan', 'alamat', 'telepon', 'foto', 'pendidikan_id', 'pekerjaan', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir', 'created_at'], 'safe'],
            [['pendidikan_id', 'status_aktif', 'jenis_kelamin'], 'integer'],
            [['nama', 'jabatan', 'alamat'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 50],
            [['telepon'], 'string', 'max' => 16],
            [['pekerjaan'], 'string', 'max' => 150],
            [['keterangan'], 'string', 'max' => 255],
            ['email', 'email']
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
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jabatan' => 'Jabatan',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'foto' => 'Foto',
            'pendidikan_id' => 'Pendidikan Terakhir',
            'pekerjaan' => 'Pekerjaan',
            'keterangan' => 'Keterangan',
            'status_aktif' => 'Status Aktif',
            'jenis_kelamin' => 'Jenis Kelamin',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->foto->saveAs('images/' . $this->foto->baseName . '.' . $this->foto->extension);
            return true;
        } else {
            return false;
        }
    }

    public function getPendidikan()
    {
        return $this->hasOne(Pendidikan::className(), ['id' => 'pendidikan_id']);
    }

}
