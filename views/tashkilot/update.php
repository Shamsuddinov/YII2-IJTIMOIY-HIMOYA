<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tashkilot */

$this->title = 'Update Tashkilot: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tashkilots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tashkilot-update">

                            <h1><?= Html::encode($this->title) ?></h1>

                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>

                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
</div>