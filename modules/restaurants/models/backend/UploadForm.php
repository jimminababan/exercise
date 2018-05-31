<?php

namespace app\modules\restaurants\models\backend;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => ['csv']],
            [['file'], 'file', 'skipOnEmpty' => false],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $folderCsv = 'uploads/restaurants/csv/'.time();
            FileHelper::createDirectory($folderCsv, $mode = 0755, $recursive = true);

            $fileName = $folderCsv.'/'.$this->file->baseName.'.'.$this->file->extension;
            $this->file->saveAs($fileName);

            return $fileName;
        } else {
            return false;
        }
    }
}
