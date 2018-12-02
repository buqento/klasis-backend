<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Biodata;
use yii\web\UploadedFile;

class ImportController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            // $model->importFile = UploadedFile::getInstance($model, 'importFile');
            // if ($model->upload()) {

                $inputFile = 'images/biodata_import.xlsx';
                try{
                    $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                    $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFile);

                }catch(Exception $e){
                    die('error');
                }

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                for($row = 1; $row <= $highestRow; $row++)
                {
                    $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, Null, TRUE, FALSE);

                    if($row == 1){
                        continue;
                    }

                    $biodata = new Biodata();

                    $biodata->nama = $rowData[0][0];
                    $biodata->jenis_kelamin = $rowData[0][1];
                    $biodata->tempat_lahir = 'ambon';
                    $biodata->tanggal_lahir = PHPExcel_Shared_Date::ExcelToPHPObject($rowData[0][2])->format('Y-m-d');
                    $biodata->golongan_darah = 'A';
                    $biodata->pendidikan_id = $rowData[0][3];
                    $biodata->alamat = $rowData[0][4];
                    $biodata->cacat_id = $rowData[0][5];
                    $biodata->jemaat_id = $rowData[0][6];
                    $biodata->sektor_id = $rowData[0][7];
                    $biodata->unit_id = $rowData[0][8];
                    $biodata->status_pernikahan = $rowData[0][9];
                    $biodata->status_hidup = $rowData[0][10];
                    $biodata->status_baptis = $rowData[0][11];
                    $biodata->status_sidi = $rowData[0][12];
                    $biodata->pekerjaan_id = $rowData[0][13];
                    $biodata->save();

print_r($biodata);
                    // print_r($biodata->getErrors());
                // }
                die('okay');


            }
        }

        return $this->render('_form', ['model' => $model]);
    }
}