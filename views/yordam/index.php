<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\YordamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yordams';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="yordam-index">

                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>
                                <?= Html::a('Create Yordam', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?php Pjax::begin(); ?>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'id',
                                    'nomi',
                                    'qisqacha:ntext',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>

                            <?php Pjax::end(); ?>

                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
</div>