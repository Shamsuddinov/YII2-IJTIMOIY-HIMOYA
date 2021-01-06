<?php

/* @var $this yii\web\View */

$this->title = 'Umumiy ma\'lumot sahifasi.';
?>

<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?=$ajratilgan?></span></div>
                                <div class="stat-heading" style="font-size: 10px;">Xayriya mablag'lari (UZS)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-smile"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text" ><span class="count"><?=$yetkazilgan?></span></div>
                                <div class="stat-heading" style="font-size: 10px;">Yetkazilgan yordam (UZS)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-like"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?=$yordamOldi?></span></div>
                                <div class="stat-heading" style="font-size: 10px;">Ja'mi yordam berilganlar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count"><?=$axoliSoni?></span></div>
                                <div class="stat-heading" style="font-size: 10px;">Ro'yhatdagi fuqarolar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Widgets -->
    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Yordam ko'rsatilgan axoli </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>FIO</th>
                                    <th>Yordam turi</th>
                                    <th>Tashkilot</th>
                                    <th>Mablag'</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($yordam_berilgan as $axoli):
                                    ?>
                                    <tr>
                                        <td class="serial"><?=$axoli->id?></td>
                                        <td><a href="<?=\yii\helpers\Url::to(['axoli/view', 'id' => $axoli->axoli_id])?>"><span class="name"><?=$axoli->axoli->fio?></span> </a></td>
                                        <td><a href="<?=\yii\helpers\Url::to(['yordam/view', 'id' => $axoli->tur_id])?>"><?=$axoli->tur->nomi?></a></td>
                                        <td><a href="<?=\yii\helpers\Url::to(['tashkilot/view', 'id' => $axoli->tashkilot_id])?>"><span class="name"><?=$axoli->tashkilot->nomi?></span> </a></td>
                                        <td>
                                            <span class="count"><?=$axoli->mablag?></span>
                                        </td>
                                    </tr>
                                    <?php
                                        endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
    <div class="clearfix"></div>
    <!--  Traffic  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="progress-box progress-1">
                                <h4 class="por-title">Yetkazilgan yordam :</h4>
                                <div class="por-txt">Yordam olgan fuqarolar soni : <?=$yordamOldi?> (<?php echo floor(($yordamOldi/$axoliSoni) * 100);?>%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: <?php echo ($yordamOldi/$axoliSoni) * 100;?>%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
<!--                            <div class="progress-box progress-2">-->
<!--                                <h4 class="por-title">Unique Visitors</h4>-->
<!--                                <div class="por-txt">29,658 Users (60%)</div>-->
<!--                                <div class="progress mb-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="progress-box progress-2">-->
<!--                                <h4 class="por-title">Targeted  Visitors</h4>-->
<!--                                <div class="por-txt">99,658 Users (90%)</div>-->
<!--                                <div class="progress mb-2" style="height: 5px;">-->
<!--                                    <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div> <!-- /.card-body -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <div class="progress-box progress-2">
                                <h4 class="por-title">O'z egasini topgan mablag'lar :</h4>
                                <div class="por-txt">Yetkazilgan yordam miqdori: <?=$yetkazilgan?> so'm (<?php echo floor(($yetkazilgan/$ajratilgan) * 100);?>%)</div>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
<!--                <div class="card-body"></div>-->
            </div>
        </div><!-- /# column -->
    </div>
    <!--  /Traffic -->
    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Ariza topshirgan fuqarolar :</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>FIO</th>
                                    <th>Yordam turi</th>
                                    <th>Mablag'</th>
                                    <th>Holati</th>
                                    <th>Yordam berish</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($yordam_soragan as $axoli):
                                    ?>
                                    <tr>
                                        <td class="serial"><?=$axoli->id?></td>
                                        <td><a href="<?=\yii\helpers\Url::to(['axoli/view', 'id' => $axoli->axoli_id])?>"><span class="name"><?=$axoli->axoli->fio?></span> </a></td>
                                        <td><a href="<?=\yii\helpers\Url::to(['yordam/view', 'id' => $axoli->tur_id])?>"><?=$axoli->tur->nomi?></a></td>
                                        <td><span class="count"><?=$axoli->mablag?></span></td>
                                        <td>
                                            <span class="badge badge-pending">Bajarilmadi</span>
                                        </td>
                                        <td>
                                            <a href="<?= \yii\helpers\Url::to(['axoli/yordam', 'id' => $axoli->id])?>"><span class="badge badge-complete">Ariza bilan tanishish</span></a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->