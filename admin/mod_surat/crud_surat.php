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
