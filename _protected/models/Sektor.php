<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sektor".
 *
 * @property int $id
 * @property string $name
 * @property int $jemaat_id
 */
class Sektor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sektor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'jemaat_id'], 'required'],
            [['jemaat_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Sektor',
            'jemaat_id' => 'Nama Jemaat',
        ];
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public static function getSektorList($jemaat_id)
    {
        $sektors = self::find()
            ->select(['id', 'name'])
            ->where(['jemaat_id' => $jemaat_id])
            ->asArray()
            ->all();
        return $sektors;
    }

}
