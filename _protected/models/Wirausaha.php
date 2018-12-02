<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wirausaha".
 *
 * @property int $id
 * @property int $biodata_id
 * @property int $usaha_id
 */
class Wirausaha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wirausaha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_usaha_id', 'biodata_id', 'usaha_id'], 'required'],
            [['kategori_usaha_id', 'biodata_id', 'usaha_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'biodata_id' => 'Nama Jemaat',
            'kategori_usaha_id' => 'Kategori usaha',
            'usaha_id' => 'Jenis Usaha',
        ];
    }

    public function getBiodata()
    {
        return $this->hasOne(Biodata::className(), ['id' => 'biodata_id']);
    }

    public function getKategori()
    {
        return $this->hasOne(KategoriUsaha::className(), ['id' => 'kategori_usaha_id']);
    }

    public function getUsaha()
    {
        return $this->hasOne(Usaha::className(), ['id' => 'usaha_id']);
    }
}
