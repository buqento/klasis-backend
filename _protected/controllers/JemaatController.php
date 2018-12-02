<?php

namespace app\controllers;

use Yii;
use app\models\Jemaat;
use app\models\JemaatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JemaatController implements the CRUD actions for Jemaat model.
 */
class JemaatController extends Controller
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

    public function tByJemaat($dari, $ke, $jenis_kelamin, $jemaat_id)
    {
        $result = Yii::$app->db->createCommand('SELECT rangeumur_jemaat('.$dari.', '.$ke.', '.$jenis_kelamin.', '.$jemaat_id.')')->queryScalar();
        return $result;
    }

    public function actionIndex()
    {
        $searchModel = new JemaatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Jemaat model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),


            //laki-laki
            'r031_16' => $this->tByJemaat(0, 3, 1, $id),
            'r461_16' => $this->tByJemaat(4, 6, 1, $id),
            'r791_16' => $this->tByJemaat(7, 9, 1, $id),
            'r10121_16' => $this->tByJemaat(10, 12, 1, $id),
            'r13151_16' => $this->tByJemaat(13, 15, 1, $id),
            'r17451_16' => $this->tByJemaat(17, 45, 1, $id),
            'r46591_16' => $this->tByJemaat(46, 59, 1, $id),
            'r60851_16' => $this->tByJemaat(60, 85, 1, $id),
            'r861201_16' => $this->tByJemaat(86, 120, 1, $id),
            //perempuan
            'r032_16' => $this->tByJemaat(0, 3, 2, $id),
            'r462_16' => $this->tByJemaat(4, 6, 2, $id),
            'r792_16' => $this->tByJemaat(7, 9, 2, $id),
            'r10122_16' => $this->tByJemaat(10, 12, 2, $id),
            'r13152_16' => $this->tByJemaat(13, 15, 2, $id),
            'r17452_16' => $this->tByJemaat(17, 45, 2, $id),
            'r46592_16' => $this->tByJemaat(46, 59, 2, $id),
            'r60852_16' => $this->tByJemaat(60, 85, 2, $id),
            'r861202_16' => $this->tByJemaat(86, 120, 2, $id),
            
        ]);
    }

    /**
     * Creates a new Jemaat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jemaat();

        $post = Yii::$app->request->post('Jemaat');
        if (Yii::$app->request->isPost) {

            $model->nama_jemaat = $post['nama_jemaat'];
            $model->nama_gereja = $post['nama_gereja'];
            $model->alamat = $post['alamat'];
            $model->telepon = $post['telepon'];
            $model->email = $post['email'];
            $model->visi = $post['visi'];
            $model->misi = $post['misi'];
            $model->gambar = UploadedFile::getInstance($model, 'gambar');
            $model->upload();
            $model->gambar = $this->generateBase64($model->gambar);

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jemaat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post('Jemaat');
        if (Yii::$app->request->isPost) {

            $model->nama_jemaat = $post['nama_jemaat'];
            $model->nama_gereja = $post['nama_gereja'];
            $model->alamat = $post['alamat'];
            $model->telepon = $post['telepon'];
            $model->email = $post['email'];
            $model->visi = $post['visi'];
            $model->misi = $post['misi'];
            $model->gambar = UploadedFile::getInstance($model, 'gambar');
            $model->upload();
            $model->gambar = $this->generateBase64($model->gambar);

            if($model->save()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jemaat model.
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
     * Finds the Jemaat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jemaat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jemaat::findOne($id)) !== null) {
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
