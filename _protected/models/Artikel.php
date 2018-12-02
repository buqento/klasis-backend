<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property int $id
 * @property string $judul
 * @property string $konten
 * @property int $kategori_id
 * @property string $created_at
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_id', 'judul', 'konten'], 'required'],
            [['konten'], 'string'],
            [['kategori_id'], 'integer'],
            [['created_at'], 'safe'],
            [['judul'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'konten' => 'Isi Konten',
            'kategori_id' => 'Kategori',
            'created_at' => 'Created At',
        ];
    }

    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }
}
