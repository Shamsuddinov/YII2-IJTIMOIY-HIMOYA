<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AxoliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="axoli-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'jinsi') ?>

    <?= $form->field($model, 'tavallud_sanasi') ?>

    <?= $form->field($model, 'kocha_id') ?>

    <?php // echo $form->field($model, 'viloyat_id') ?>

    <?php // echo $form->field($model, 'shaxar_id') ?>

    <?php // echo $form->field($model, 'nogironligi') ?>

    <?php // echo $form->field($model, 'chin_yetim') ?>

    <?php // echo $form->field($model, 'yetim') ?>

    <?php // echo $form->field($model, 'ishsiz') ?>

    <?php // echo $form->field($model, 'boquvchisiz') ?>

    <?php // echo $form->field($model, 'uysiz') ?>

    <?php // echo $form->field($model, 'farzandlari') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
