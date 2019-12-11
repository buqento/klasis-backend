<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property int $id
 * @property string $img_url
 * @property string $created_at
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_url', 'description'], 'required'],
            [['created_at'], 'safe'],
            // [['img_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_url' => 'Gambar Slide',
            'description' => 'Keterangan',
            'show' => 'Tampilkan',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->img_url->saveAs('images/' . $this->img_url->baseName . '.' . $this->img_url->extension);
            return true;
        } else {
            return false;
        }
    }
}
