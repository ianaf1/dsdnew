<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'tambah') {
    $data = [
        'id_kelas'          => $_POST['id'],
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
