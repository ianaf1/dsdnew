<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $verifikasi = (isset($_POST['verifikasi'])) ? 1 : 0;
    $data = [
        'nama_bayar' => $_POST['nama'],
        'verifikasi' => $verifikasi
    ];
    $id_bayar = $_POST['id_bayar'];
    $excec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    echo $exec;
}
if ($pg == 'tambahsiswa') {
    $data = [
        'id_kelas'      => $$_POST['id'],
        'id_daftar'     => $_POST['id_daftar'],
        'id_jenjang'     => $_POST['id_jenjang'],
        'nama_kelas'     => $_POST['nama_kelas'],

    ];
    $exec = insert($koneksi, 'rombel', $data);
    // $exec = insert($koneksi, 'transaksi', $data2);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];
    delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    delete($koneksi, 'transaksi', ['kode_transaksi' => $id_bayar]);
}
if ($pg == 'verifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 1
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}
if ($pg == 'batalverifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 0
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}
