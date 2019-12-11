<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batch".
 *
 * @property int $id
 * @property string $file_import
 * @property string $created_at
 */
class Batch extends \yii\db\ActiveRecord
{

    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'batch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            // [['file_import'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_import' => 'File Import',
            'created_at' => 'Created At',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->file_import->saveAs('uploads/' . $this->file_import->baseName . '.' . $this->file_import->extension);
            return true;
        } else {
            return false;
        }
    }
}
