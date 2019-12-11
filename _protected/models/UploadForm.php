<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $importFile;

    public function rules()
    {
        return [
            [['importFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->importFile->saveAs('images/' . $this->importFile->baseName . '.' . $this->importFile->extension);
            return true;
        } else {
            return false;
        }
    }
}