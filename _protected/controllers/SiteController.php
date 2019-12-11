<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Biodata;
use app\models\BiodataMajelis;
use app\models\Jemaat;
use app\models\Unit;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function tByAll($dari, $ke, $jenis_kelamin)
    {
        $result = Yii::$app->db->createCommand('SELECT rangeumur('.$dari.', '.$ke.', '.$jenis_kelamin.')')->queryScalar();
        return $result;
    }

    public function actionIndex()
    {

        $jumlahJemaat = Jemaat::find()->count();
        $jumlahUnit = Unit::find()->count();
        $jumlahJiwa = Biodata::find()->count();
        $jumlahLaki = Biodata::find()->where(['jenis_kelamin' => 1])->count();
        $jumlahPerempuan = Biodata::find()->where(['jenis_kelamin' => 2])->count();
        $jumlahPelayan = BiodataMajelis::find()->where(['status_aktif' => 1])->count();

        
        return $this->render('index', [
            'jumlahJemaat' => $jumlahJemaat,
            'jumlahUnit' => $jumlahUnit,
            'jumlahJiwa' => $jumlahJiwa,
            'jumlahLaki' => $jumlahLaki,
            'jumlahPerempuan' => $jumlahPerempuan,
            'jumlahPelayan' => $jumlahPelayan,

            'r031' => $this->tByAll(0, 3, 1),
            'r032' => $this->tByAll(0, 3, 1),
            'r461' => $this->tByAll(4, 6, 1),
            'r462' => $this->tByAll(4, 6, 2),
            'r791' => $this->tByAll(7, 9, 1),
            'r792' => $this->tByAll(7, 9, 2),
            'r10121' => $this->tByAll(10, 12, 1),
            'r10122' => $this->tByAll(10, 12, 2),
            'r13151' => $this->tByAll(13, 15, 1),
            'r13152' => $this->tByAll(13, 15, 2),
            'r17451' => $this->tByAll(17, 45, 1),
            'r17452' => $this->tByAll(17, 45, 1),
            'r46591' => $this->tByAll(46, 59, 1),
            'r46592' => $this->tByAll(46, 59, 2),
            'r60851' => $this->tByAll(60, 85, 1),
            'r60852' => $this->tByAll(60, 85, 2),
            'r861201' => $this->tByAll(86, 120, 1),
            'r861202' => $this->tByAll(86, 120, 2)

        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
