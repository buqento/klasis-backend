<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_kelembagaan".
 *
 * @property int $id
 * @property string $kategori
 * @property int $jemaat_id
 * @property string $nama_file
 * @property string $created_at
 */
class ProdukKelembagaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk_kelembagaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_id', 'jemaat_id', 'nama_file'], 'required'],
            [['jemaat_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori',
            'jemaat_id' => 'Jemaat ID',
            'nama_file' => 'Nama File',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->nama_file->saveAs('images/' . $this->nama_file->baseName . '.' . $this->nama_file->extension);
            return true;
        } else {
            return false;
        }
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getKategori()
    {
        return $this->hasOne(KategoriProduk::className(), ['id' => 'kategori_id']);
    }
}
