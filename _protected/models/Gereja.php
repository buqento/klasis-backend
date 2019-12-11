<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gereja".
 *
 * @property int $id
 * @property string $name
 * @property int $jemaat_id
 * @property string $created_at
 */
class Gereja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gereja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'jemaat_id'], 'required'],
            [['jemaat_id'], 'integer'],
            [['created_at'], 'safe'],
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
            'name' => 'Nama Gereja',
            'jemaat_id' => 'Nama Jemaat',
            'created_at' => 'Created At',
        ];
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

}
