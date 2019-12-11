<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usaha".
 *
 * @property int $id
 * @property string $name
 * @property int $kategori_usaha_id
 */
class Usaha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usaha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'kategori_usaha_id'], 'required'],
            [['kategori_usaha_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Jenis Usaha',
            'kategori_usaha_id' => 'Kategori Usaha',
        ];
    }

    public static function getUsahaList($kategori_usaha_id)
    {
        $usahas = self::find()
            ->select(['id', 'name'])
            ->where(['kategori_usaha_id' => $kategori_usaha_id])
            ->asArray()
            ->all();
        return $usahas;
    }

    public function getKategori()
    {
        return $this->hasOne(KategoriUsaha::className(), ['id' => 'kategori_usaha_id']);
    }
}
