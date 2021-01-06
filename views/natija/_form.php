<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Natija */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="natija-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mablag')->textInput() ?>

    <?= $form->field($model, 'axoli_id')->textInput() ?>

    <?= $form->field($model, 'tashkilot_id')->textInput() ?>

    <?= $form->field($model, 'tur_id')->textInput() ?>

    <?= $form->field($model, 'bajarildi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
