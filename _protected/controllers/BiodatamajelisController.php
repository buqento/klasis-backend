<?php

namespace app\controllers;

use Yii;
use app\models\BiodataMajelis;
use app\models\BiodatamajelisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BiodatamajelisController implements the CRUD actions for Biodatamajelis model.
 */
class BiodatamajelisController extends Controller
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
     * Lists all Biodatamajelis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BiodatamajelisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Biodatamajelis model.
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
     * Creates a new Biodatamajelis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BiodataMajelis();

        $post = Yii::$app->request->post('BiodataMajelis');
        if (Yii::$app->request->isPost) {

            $model->nama = $post['nama'];
            $model->tempat_lahir = $post['tempat_lahir'];
            $model->tanggal_lahir = $post['tanggal_lahir'];
            $model->jabatan = $post['jabatan'];
            $model->alamat = $post['alamat'];
            $model->telepon = $post['telepon'];
            $model->email = $post['email'];
            $model->pendidikan_id = $post['pendidikan_id'];
            $model->pekerjaan = $post['pekerjaan'];
            $model->keterangan = $post['keterangan'];
            $model->jenis_kelamin = $post['jenis_kelamin'];
            $model->foto = UploadedFile::getInstance($model, 'foto');
            $model->upload();
            $model->foto = $this->generateBase64($model->foto);

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Biodatamajelis model.
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
     * Deletes an existing Biodatamajelis model.
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
     * Finds the Biodatamajelis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Biodatamajelis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Biodatamajelis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function generateBase64($image)
    {
        $path = 'images/' . $image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        unlink($path);
        return $base64;
    }
}
