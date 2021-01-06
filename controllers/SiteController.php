<?php

namespace app\controllers;

use app\models\Axoli;
use app\models\Natija;
use app\models\Tashkilot;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use app\models\TalabaForm;
use app\models\FirstForm;
use app\models\Yangiliklar;
use yii\data\Pagination;
use app\models\Bolimlar;

class SiteController extends Controller
{
    public $layout = 'extra';
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
    public function actionYordam($id){
        $foydalanuvchi = Natija::findOne(['id' => $id]);
        return $this->render('yordam', ['foydalanuvchi' => $foydalanuvchi]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $axoli = Axoli::find()->count();
        $yordamOldi = Natija::find()->select('COUNT(*) as c')->where(['bajarildi' => 1])->groupBy('axoli_id')->count('c');
        $yetkazilgan = Natija::find()->where(['bajarildi' => 1])->sum('mablag');
        $ajratilgan = Tashkilot::find()->sum('ajratilgan_pul');
        $yordam_berilgan = Natija::find()->where(['bajarildi' => 1])->orderBy(['id' => SORT_DESC])->limit(10)->all();
        $yordam_soragan = Natija::find()->where(['bajarildi' => 0])->orderBy(['id' => SORT_ASC])->all();
        return $this->render('index', [
            'yordam_berilgan' => $yordam_berilgan,
            'yordam_soragan' => $yordam_soragan,
            'axoliSoni' => $axoli,
            'yordamOldi' => $yordamOldi,
            'yetkazilgan' => $yetkazilgan,
            'ajratilgan' => $ajratilgan,
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
