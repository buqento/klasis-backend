<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biodata_pendeta".
 *
 * @property int $id
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property int $jenis_kelamin
 * @property string $created_at
 */
class Biodatapendeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata_pendeta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir', 'created_at'], 'safe'],
            [['jenis_kelamin'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 50],
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
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'created_at' => 'Created At',
        ];
    }
}
