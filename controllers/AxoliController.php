<?php

namespace app\controllers;

use app\models\ArizaForm;
use app\models\Natija;
use app\models\Tashkilot;
use app\models\YordamForm;
use Yii;
use app\models\Axoli;
use app\models\AxoliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AxoliController implements the CRUD actions for Axoli model.
 */
class AxoliController extends Controller
{
    public $layout = 'extra';
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
     * Lists all Axoli models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AxoliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Axoli model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $sorov = Natija::find()->where(['axoli_id' => $id, 'bajarildi' => 1])->sum('mablag');
        $berilgan_summa =  $sorov ? $sorov: 0;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'berilgan_summa' => $berilgan_summa
        ]);
    }
    public function actionAriza($id){
        $fuqaro = Axoli::findOne(['id' => $id]);
        $ariza = new ArizaForm();
        if($fuqaro):
            $ariza_yuborish = new Natija();
            if($ariza->load(Yii::$app->request->post())):
                $ariza_yuborish->axoli_id = $fuqaro->id;
                $ariza_yuborish->tashkilot_id = 1;
                $ariza_yuborish->bajarildi = 0;
                $ariza_yuborish->mablag = $ariza->mablag;
                $ariza_yuborish->tur_id = $ariza->turi[0];
                $ariza_yuborish->save();
                    return $this->redirect(['yordam', 'id' => $ariza_yuborish->id]);
            else:
                return $this->render('ariza', ['fuqaro' => $fuqaro, 'ariza' => $ariza]);
            endif;
        else:
            return $this->render('ariza', ['xatolik' => 'Login topilmadi.']);
        endif;
    }

    public function actionYordam($id){
        $forma = new YordamForm();
        $xato = 0;
        if($forma->load(Yii::$app->request->post())):
            $tashkilot = Tashkilot::findOne(['login' => $forma->login, 'parol' => $forma->parol]);
            $mablag = $tashkilot->ajratilgan_pul >= $forma->mablag ? $forma->mablag : 0;
            if($tashkilot && $mablag != 0):
                $tashkilot->yetkazilgan_pul += $mablag;
                $natija = Natija::findOne(['id' => $id]);
                $natija->bajarildi = 1;
                $natija->tashkilot_id = $tashkilot->id;
                $natija->mablag = $mablag;
                $natija->save();
                $tashkilot->save();
                return $this->redirect(['view', 'id' => $natija->axoli_id]);
            else:
                $xato = 1;
            endif;
        else:
            $xato = 1;
        endif;
        if($xato == 1):
            $sorov = Natija::find()->where(['id' => $id, 'bajarildi' => 0])->sum('mablag');
            $berilgan_summa =  $sorov ? $sorov: 0;
            $sorov = Natija::findOne(['id' => $id, 'bajarildi' => 0]);
            $forma->mablag = $berilgan_summa ? $berilgan_summa : 0;
            return $this->render('yordam', [
                'model' => $this->findModel($sorov->axoli_id),
                'berilgan_summa' => $berilgan_summa,
                'forma' => $forma
            ]);
        endif;
    }

    /**
     * Creates a new Axoli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Axoli();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Axoli model.
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
     * Deletes an existing Axoli model.
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
     * Finds the Axoli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Axoli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Axoli::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
