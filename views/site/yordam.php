<?php

/* @var $this yii\web\View */

$this->title = 'Yordamni yetkazish.';
?>

<!-- Animated -->
<div class="animated fadeIn">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Foydalanuvchi anketasi :</h4>
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
                                    <td><?= $foydalanuvchi->id?></td>
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