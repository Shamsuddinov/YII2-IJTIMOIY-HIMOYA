<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tashkilot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tashkilot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ajratilgan_pul')->textInput() ?>

    <?= $form->field($model, 'yetkazilgan_pul')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
