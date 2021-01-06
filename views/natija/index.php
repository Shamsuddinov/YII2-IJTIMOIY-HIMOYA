<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NatijaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berilgan barcha yordam';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Animated -->
<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="natija-index">

                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>
                                <?= Html::a('Create Natija', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?php Pjax::begin(); ?>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    'id',
                                    'mablag',
                                    'axoli_id',
                                    'tashkilot_id',
                                    'tur_id',
                                    //'bajarildi',

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