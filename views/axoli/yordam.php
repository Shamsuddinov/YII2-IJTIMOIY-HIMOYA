<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

\yii\web\YiiAsset::register($this);
$this->title = 'Yordamni yetkazish.';
$form = ActiveForm::begin(['method' => 'POST']);
?>

<!-- Animated -->
<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'label' => 'FIO :',
                                    'value' => $model->fio,
                                ],
                                [
                                    'label' => 'So\'ralgan yordam puli :',
                                    'value' => $berilgan_summa ? $berilgan_summa." so'm" : "Hali yordam ko'rsatilmadi"
                                ],
                                [
                                    'label' => 'Jinsi :',
                                    'value' => $model->jinsi == 1 ? "Erkak" : "Ayol"
                                ],
                                [
                                    'label' => 'Tavallud sanasi : ',
                                    'value' => $model->tavallud_sanasi
                                ],
                                [
                                    'label' => "Manzil :",
                                    'value' => $model->kocha->nomi." ko'chasi, ".$model->shaxar->nomi.", ".$model->viloyat->nomi
                                ],
                                [
                                    'label' => 'Nogironligi : ',
                                    'value' => $model->nogironligi > 0 ? $model->nogironligi."-guruh nogironi" : "Nogironligi yo'q"
                                ],
                                [
                                    'label' => 'Yetim : ',
                                    'value' => $model->chin_yetim == 1 ? "Ota va onasini yo'qotgan" :
                                        ($model->yetim == 1 ? "Ota yoki onasini yo'qotgan. " : "Yetim emas."),
                                ],
                                [
                                    'label' => 'Ish joyiga egami : ',
                                    'value' => $model->ishsiz == 1 ? "Ishsiz." : "Ishlaydi."
                                ],
                                [
                                    'label' => 'Boquvchisini yo\'qotgan : ',
                                    'value' => $model->boquvchisiz == 1 ? "Xa, boquvchisini yo'qotgan.." : "Qarovchisi bor."
                                ],
                                [
                                    'label' => 'Uy yoki xonadoni bormi : ',
                                    'value' => $model->uysiz == 1 ? "Yo'q. Ijarada yoki qarindoshlari bilan turadi." : "Ha, o'z xonadoniga ega."
                                ],
                                [
                                    'label' => 'Farzandlari bormi : ',
                                    'value' => $model->farzandlari == 1 ? $model->farzandlari." ta farzandi bor." : "Farzandlari bor lekin qarovsiz yoki farzandlari yo'q."
                                ],
                            ],
                        ]) ?>
                        <?php
                            if(isset($xatolik)):
                                echo $xatolik;
                            endif;
                        ?>
                        <?= $form->field($forma, 'login')->textInput(['autofocus' => true])->label("Tashkilot logini : ")?>
                        <?= $form->field($forma, 'parol')->passwordInput()->label("Yordam uchun parolni kiriting :")?>
                        <?= $form->field($forma, 'mablag')->textInput()->label("Ko'rsatiladigan yordam puli : ")?>
                        <div class="form-group">
                            <?= Html::submitButton("Yordam qo'lini cho'zish.", ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
</div>
<?php
    ActiveForm::end();
?>