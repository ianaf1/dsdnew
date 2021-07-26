<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>


<div class="row ">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 animated flipInX">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa Kelas 10</h4>
                </div>
                <div class="card-body">
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '10'")) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 animated flipInX">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-mars"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Laki-laki</h4>
                </div>
                <div class="card-body">
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas='10' && jenkel = 'L'")) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 animated flipInX">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-venus"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Perempuan</h4>
                </div>
                <div class="card-body">
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas='10' && jenkel = 'P'")) ?>
                </div>
            </div>
        </div>
    </div>
</div>