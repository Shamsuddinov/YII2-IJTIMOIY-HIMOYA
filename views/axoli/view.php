<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Axoli */

$this->title = "Ko'rish : ".$model->fio."ning sahifasi";
$this->params['breadcrumbs'][] = ['label' => 'Axolis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="animated fadeIn">
    <div class="card">
        <div class="card-body">

            <h2><?= $this->title ?></h2>

            <p>
                <?= Html::a("Ariza topshirish", ['ariza', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a("Ma'lumotlarni yangilash", ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Rostdan ham o\'chimoqchimisiz?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                        [
                                'label' => 'FIO :',
                                'value' => $model->fio,
                        ],
                    [
                            'label' => 'Ko\'rsatilgan yordam puli :',
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

        </div>
    </div>
</div>
