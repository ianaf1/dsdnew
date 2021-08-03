<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubahmaster') {
    $data = [
        'nama_surat' => $_POST['nama_masuk'],
        'tipe_surat'    => $_POST['tipe'],
    ];
    $id_master = $_POST['id_master'];
    update($koneksi, 's_master', $data, ['id_master' => $id_master]);
}
if ($pg == 'tambahmaster') {
    $data = [

        'nama_surat'   => $_POST['nama_surat'],
        'tipe_surat'    => $_POST['tipe_surat'],
        'kode_surat'         => $_POST['kode_surat']
    ];
    $exec = insert($koneksi, 's_master', $data);
    echo $exec;
}
if ($pg == 'hapusmaster') {
    $id_master = $_POST['id_master'];
    delete($koneksi, 's_master', ['id_master' => $id_master]);
}

if ($pg == 'tambahsurat') {
    $today = date("Ymd");
    $bulan = date('m');
    $tahun = date('y');
    $q1    = mysqli_query($koneksi, "select * from s_master where id_master = '$_POST[id_master]' ");
    $surat = mysqli_fetch_array($q1);
    $query = "SELECT max(no_surat) AS last FROM s_arsip";
    $hasil = mysqli_query($koneksi, $query);
    $datah  = mysqli_fetch_array($hasil);
    $lastNo = $datah['last'];
    $nextNo = $lastNo + 1;
    $data = [
        'id_master'     => $_POST['id_master'],
        'tgl_surat'     => $today,
        'nama_surat'    => $surat['nama_surat'],
        'kode_surat'    => $surat['kode_surat'],
        'no_surat'      => $nextNo,
        'id_bulan'      => $bulan,
        'id_tahun'      => $tahun,
        'id_daftar'     => $_POST['id_daftar'],
        'id_ptk'        => $_POST['id_ptk']
    ];
    $exec = insert($koneksi, 's_arsip', $data);
    echo $exec;
}
if ($pg == 'hapussurat') {
    $id_surat = $_POST['id_surat'];
    delete($koneksi, 's_arsip', ['id_surat' => $id_surat]);
}
