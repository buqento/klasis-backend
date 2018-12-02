<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jemaat".
 *
 * @property int $id
 * @property string $nama_jemaat
 * @property string $nama_gereja
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string $gambar
 * @property string $visi
 * @property string $misi
 * @property string $created_at
 */
class Jemaat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jemaat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_jemaat', 'nama_gereja', 'alamat', 'telepon', 'gambar', 'visi', 'misi'], 'required'],
            [['visi', 'misi'], 'string'],
            [['created_at'], 'safe'],
            [['nama_jemaat', 'nama_gereja'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 255],
            [['telepon'], 'string', 'max' => 16],
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
            'nama_jemaat' => 'Nama Jemaat',
            'nama_gereja' => 'Nama Gereja',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'gambar' => 'Gambar',
            'visi' => 'Visi',
            'misi' => 'Misi',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->gambar->saveAs('images/' . $this->gambar->baseName . '.' . $this->gambar->extension);
            return true;
        } else {
            return false;
        }
    }
}
