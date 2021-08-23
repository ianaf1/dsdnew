<?php
$tahun_ajaran_aktif = mysqli_fetch_array(mysqli_query($koneksi, "select * from thn_ajaran where thn_ajaran_aktif='1'"));
$semester_aktif = mysqli_fetch_array(mysqli_query($koneksi, "select * from semester where is_active='1'"));
$tahun_aktif = date('Y');
