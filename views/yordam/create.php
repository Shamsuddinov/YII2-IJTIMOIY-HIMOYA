<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Yordam */

$this->title = 'Create Yordam';
$this->params['breadcrumbs'][] = ['label' => 'Yordams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="yordam-create">

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