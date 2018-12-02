<?php

namespace app\controllers;

use Yii;
use app\models\Biodata;
use app\models\Sektor;
use app\models\Unit;
use app\models\BiodataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BiodataController implements the CRUD actions for Biodata model.
 */
class BiodataController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Biodata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BiodataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Biodata model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Biodata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Biodata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Biodata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Biodata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Biodata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Biodata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Biodata::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSektor() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $jemaat_id = $parents[0];
                $out = Sektor::getSektorList($jemaat_id); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionUnit() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $sektor_id = $parents[0];
                $out = Unit::getUnitList($sektor_id); 
                return json_encode(['output'=>$out, 'selected'=>'']);
            }
        }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

    public function actionImport()
    {
        $model = new Biodata();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully

                $inputFile = 'images/biodata.xlsx';
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


                    $biodata->nama = $rowData[0][0];
                    $biodata->jenis_kelamin = $rowData[0][1];
                    $biodata->tanggal_lahir = date($rowData[0][2]);
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

                    print_r($biodata->getErrors());
                }
                die('okay');

            }
        }

        return $this->render('import', ['model' => $model]);
    }

    // public function actionImport()
    // {
    //     $biodata = new Biodata();

    //     if ($biodata->load(Yii::$app->request->post())) {

    //         $inputFile = 'images/biodata.xlsx';
    //         try{
    //             $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
    //             $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
    //             $objPHPExcel = $objReader->load($inputFile);

    //         }catch(Exception $e){
    //             die('error');
    //         }

    //         $sheet = $objPHPExcel->getSheet(0);
    //         $highestRow = $sheet->getHighestRow();
    //         $highestColumn = $sheet->getHighestColumn();

    //         for($row = 1; $row <= $highestRow; $row++)
    //         {
    //             $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, Null, TRUE, FALSE);

    //             if($row == 1){
    //                 continue;
    //             }


    //             $biodata->nama = $rowData[0][0];
    //             $biodata->jenis_kelamin = $rowData[0][1];
    //             $biodata->tanggal_lahir = date($rowData[0][2]);
    //             $biodata->pendidikan_id = $rowData[0][3];
    //             $biodata->alamat = $rowData[0][4];
    //             $biodata->cacat_id = $rowData[0][5];
    //             $biodata->jemaat_id = $rowData[0][6];
    //             $biodata->sektor_id = $rowData[0][7];
    //             $biodata->unit_id = $rowData[0][8];
    //             $biodata->status_pernikahan = $rowData[0][9];
    //             $biodata->status_hidup = $rowData[0][10];
    //             $biodata->status_baptis = $rowData[0][11];
    //             $biodata->status_sidi = $rowData[0][12];
    //             $biodata->pekerjaan_id = $rowData[0][13];
    //             $biodata->save();

    //             print_r($biodata->getErrors());
    //         }
    //         die('okay');

    //         // return $this->redirect(['index']);
    //     }

    //     return $this->render('import');
    // }

}
