<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AxoliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fuqarolar ro\'yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Animated -->
<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="axoli-index">

                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>
                                <?= Html::a('Fuqaro qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?php Pjax::begin(); ?>
<!--                            --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

//                                    'id',
                                    'fio',
                                    [
                                        'label' => 'Jinsi :',
                                        'attribute' => 'jinsi',
                                        'value' => function($data){
                                            return $data->jinsi == 1 ? "Erkak" : "Ayol";
                                        }
                                    ],
                                    'tavallud_sanasi',
                                    [
                                            'label' => 'Viloyat :',
                                            'value' => 'viloyat.nomi',
                                    ],
                                    [
                                            'label' => 'Nogironligi :',
                                            'attribute' => 'nogironligi',
                                            'value' => function($data){
                                                        return $data->nogironligi ? "Bor." : "Yo'q";
                                            }
                                    ],
                                    [
                                        'label' => 'Chin yetim :',
                                        'attribute' => 'chin_yetim',
                                        'value' => function($data){
                                            return $data->chin_yetim ? "Ha." : "Yo'q";
                                        }
                                    ],
                                    [
                                        'label' => 'Farzandlari :',
                                        'attribute' => 'farzandlari',
                                        'value' => function($data){
                                            return $data->farzandlari ? "Bor." : "Yo'q";
                                        }
                                    ],
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