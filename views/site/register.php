<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;

    $forma = ActiveForm::begin(['method' => 'POST']);
    echo $model->rasm;
    ActiveForm::end();
    ?>