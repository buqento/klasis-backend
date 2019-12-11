<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $name
 * @property int $jemaat_id
 * @property int $sektor_id
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'sektor_id'], 'required'],
            [['jemaat_id', 'sektor_id'], 'integer'],
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
            'name' => 'Nama Unit',
            'jemaat_id' => 'Nama Jemaat',
            'sektor_id' => 'Nama Sektor',
        ];
    }

    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getSektor()
    {
        return $this->hasOne(Sektor::className(), ['id' => 'sektor_id']);
    }

    public static function getUnitList($sektor_id)
    {
        $units = self::find()
            ->select(['id', 'name'])
            ->where(['sektor_id' => $sektor_id])
            ->asArray()
            ->all();
        return $units;
    }

}
