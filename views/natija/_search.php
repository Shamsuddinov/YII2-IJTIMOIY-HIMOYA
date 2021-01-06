<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NatijaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="natija-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mablag') ?>

    <?= $form->field($model, 'axoli_id') ?>

    <?= $form->field($model, 'tashkilot_id') ?>

    <?= $form->field($model, 'tur_id') ?>

    <?php // echo $form->field($model, 'bajarildi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
