<?php

namespace app\controllers;

use Yii;
use app\models\Batch;
use app\models\BatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * BatchController implements the CRUD actions for Batch model.
 */
class BatchController extends Controller
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
     * Lists all Batch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Batch model.
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
     * Creates a new Batch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Batch();

        $post = Yii::$app->request->post('Batch');
        if (Yii::$app->request->isPost) {

            $model->file_import = UploadedFile::getInstance($model, 'file_import');
            $model->upload();

            $handle = fopen('uploads/'.$model->file_import, 'r');
            if($handle){

                if($model->save()){

                    $count = 0;
                    while(($line = fgetcsv($handle, 1000, ";")) != FALSE){

                        $bulkInsertArray[] = [
                            'nama' => $line[0],
                            'jenis_kelamin' => $line[1],
                            'tempat_lahir' => $line[2],
                            'tanggal_lahir' => $line[3],
                            'golongan_id' => $line[4],
                            'pendidikan_id' => $line[5],
                            'alamat' => $line[6],
                            'cacat_id' => $line[7],
                            'jemaat_id' => $line[8],
                            'sektor_id' => $line[9],
                            'unit_id' => $line[10],
                            'status_pernikahan' => $line[11],
                            'status_hidup' => $line[12],
                            'status_baptis' => $line[13],
                            'status_sidi' => $line[14],
                            'pekerjaan_id' => $line[15]
                        ];
                    }

                    $tableName = 'biodata';
                    $columnNameArray = [
                        'nama', 'jenis_kelamin', 'tempat_lahir', 
                        'tanggal_lahir', 'golongan_id', 'pendidikan_id', 'alamat', 'cacat_id', 
                        'jemaat_id', 'sektor_id', 'unit_id', 'status_pernikahan', 'status_hidup', 
                        'status_baptis', 'status_sidi', 'pekerjaan_id'];
                    Yii::$app->db->createCommand()->batchInsert($tableName, $columnNameArray, $bulkInsertArray)->execute();

                    return $this->redirect(['index']);
                }

                fclose($handle);

            }

        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Batch model.
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
     * Deletes an existing Batch model.
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
     * Finds the Batch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Batch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Batch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
