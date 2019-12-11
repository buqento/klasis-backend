<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Artikelx;
use yii\web\UploadedFile;

class ImportController extends Controller
{

    public function actionArtikel()
    {
        $model = new Artikelx();


        if (Yii::$app->request->isPost) {
            // $model->importFile = UploadedFile::getInstance($model, 'importFile');
            // if ($model->upload()) {


$objPHPExcel = new \PHPExcel();

 

 $sheet=0;

  

 $objPHPExcel->setActiveSheetIndex($sheet);

 

foreach ($foos as $foo) {  

    

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

    

    $objPHPExcel->getActiveSheet()->setTitle($foo->bar)

    

     ->setCellValue('A1', 'Firstname')

     ->setCellValue('B1', 'Lastname');

     

     $row=2;

        

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$foo->firstname); 

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$foo->lastname);

        $row++ ;

        }

    

        header('Content-Type: application/vnd.ms-excel');

        $filename = "MyExcelReport_".date("d-m-Y-His").".xls";

    header('Content-Disposition: attachment;filename='.$filename .' ');

        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');   



                // $inputFile = 'images/artikel.xlsx';
                // try{
                //     $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                //     $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                //     $objPHPExcel = $objReader->load($inputFile);
                //     $objPHPExcel = new PHPExcel();


                // }catch(Exception $e){
                //     die('error');
                // }

                // $sheet = $objPHPExcel->getSheet(0);
                // $highestRow = $sheet->getHighestRow();
                // $highestColumn = $sheet->getHighestColumn();

                // for($row = 1; $row <= $highestRow; $row++)
                // {
                //     $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, Null, TRUE, FALSE);

                //     if($row == 1){
                //         continue;
                //     }

                //     $artikel = new Artikelx();
                //     $artikel->judul = $rowData[0][0];
                //     $artikel->konten = $rowData[0][1];
                //     $artikel->kategori_id = $rowData[0][2];
                //     $artikel->save();
                // }

                // return $this->render('_message', [
                //         'response' => 'OK',
                //     ]);


            // }
        }

        return $this->render('_form', ['model' => $model]);

    }

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
                    $biodata->tempat_lahir = $rowData[0][2];
                    // $biodata->tanggal_lahir = PHPExcel_Shared_Date::ExcelToPHPObject($rowData[0][2])->format('Y-m-d');
                    $biodata->tanggal_lahir = $rowData[0][3];
                    $biodata->golongan_id = $rowData[0][4];
                    $biodata->pendidikan_id = $rowData[0][5];
                    $biodata->alamat = $rowData[0][6];
                    $biodata->cacat_id = $rowData[0][7];
                    $biodata->jemaat_id = $rowData[0][8];
                    $biodata->sektor_id = $rowData[0][9];
                    $biodata->unit_id = $rowData[0][10];
                    $biodata->status_pernikahan = $rowData[0][11];
                    $biodata->status_hidup = $rowData[0][12];
                    $biodata->status_baptis = $rowData[0][13];
                    $biodata->status_sidi = $rowData[0][14];
                    $biodata->pekerjaan_id = $rowData[0][15];

                    $biodata->save();

                    // print_r($biodata);
                    // print_r($biodata->getErrors());
                }
                // die('okay');

                return $this->render('_message', [
                        'response' => 'OK',
                    ]);


            // }
        }

        return $this->render('_form', ['model' => $model]);

    }
}