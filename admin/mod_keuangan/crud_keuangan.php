<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubahmasuk') {
    $data = [
        'nama_masuk' => $_POST['nama_masuk'],
        'sumber'    => $_POST['sumber'],
        'status' => 1
    ];
    $id_masuk = $_POST['id_masuk'];
    update($koneksi, 'keu_pemasukan', $data, ['id_masuk' => $id_masuk]);
}
if ($pg == 'tambahmasuk') {
    $data = [
        'id_masuk'     => $_POST['id_masuk'],
        'nama_masuk'   => $_POST['nama_masuk'],
        'sumber'    => $_POST['sumber'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'keu_pemasukan', $data);
    echo $exec;
}
if ($pg == 'hapusmasuk') {
    $id_masuk = $_POST['id_masuk'];
    delete($koneksi, 'keu_pemasukan', ['id_masuk' => $id_masuk]);
}

if ($pg == 'ubahkeluar') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_keluar' => $_POST['nama_keluar'],
        'status' => $status
    ];
    $id_keluar = $_POST['id_keluar'];
    update($koneksi, 'keu_keluar', $data, ['id_keluar' => $id_keluar]);
}
if ($pg == 'tambahkeluar') {
    $data = [
        'id_keluar'     => $_POST['id_keluar'],
        'nama_keluar'   => $_POST['nama_keluar'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'keu_pengeluaran', $data);
    echo $exec;
}
if ($pg == 'hapuskeluar') {
    $id_keluar = $_POST['id_keluar'];
    delete($koneksi, 'keu_pengeluaran', ['id_keluar' => $id_keluar]);
}
