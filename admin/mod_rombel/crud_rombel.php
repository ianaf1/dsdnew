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
if ($pg == 'tambah') {
    $data = [
        'id_kelas'          => $_POST['id_kelas'],
        'id_jenjang'        => $_POST['id_jenjang'],
        'nama_rombel'       => $_POST['nama_kelas'],
        'id_daftar'         => $_POST['id_daftar']
    ];
    $exec = insert($koneksi, 'rombel', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];
    delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    delete($koneksi, 'transaksi', ['kode_transaksi' => $id_bayar]);
}
