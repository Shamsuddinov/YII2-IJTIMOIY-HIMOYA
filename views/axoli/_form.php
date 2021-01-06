<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Axoli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="axoli-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jinsi')->textInput() ?>

    <?= $form->field($model, 'tavallud_sanasi')->textInput() ?>

    <?= $form->field($model, 'kocha_id')->textInput() ?>

    <?= $form->field($model, 'viloyat_id')->textInput() ?>

    <?= $form->field($model, 'shaxar_id')->textInput() ?>

    <?= $form->field($model, 'nogironligi')->textInput() ?>

    <?= $form->field($model, 'chin_yetim')->textInput() ?>

    <?= $form->field($model, 'yetim')->textInput() ?>

    <?= $form->field($model, 'ishsiz')->textInput() ?>

    <?= $form->field($model, 'boquvchisiz')->textInput() ?>

    <?= $form->field($model, 'uysiz')->textInput() ?>

    <?= $form->field($model, 'farzandlari')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
