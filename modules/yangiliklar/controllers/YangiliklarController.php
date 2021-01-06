<?php

namespace app\modules\yangiliklar\controllers;

class YangiliklarController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
