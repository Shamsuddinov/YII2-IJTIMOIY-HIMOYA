<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
$forma = ActiveForm::begin();
$yordam_turi = \app\models\Yordam::find()->all();
$ari = array();
foreach ($yordam_turi as $yordam => $val):
    $ari[$yordam_turi[$yordam]->id] = $yordam_turi[$yordam]->nomi;
endforeach;

?>


<div class="animated fadeIn">
    <div class="card">
        <div class="card-body">
            <?php if(!isset($xatolik)):?>
                <?= $forma->field($ariza, 'mablag')->textInput(); ?>
                <?= $forma->field($ariza, 'turi[]')->dropDownList($ari); ?>
                <?= Html::submitButton('Arizani yuborish', ['class' => 'btn btn-success'])?>
            <?php else:?>
                <?php print_r($xatolik)?>
            <?php endif;?>
        </div>
    </div>
</div>

<?php
    ActiveForm::end();
?>