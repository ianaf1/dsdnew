<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $data = [
        'nama_hari'         => $_POST['nama_hari'],
        'jam_masuk'         => $_POST['jam_masuk'],
        'jam_keluar'       => $_POST['jam_keluar']
    ];
    $id_hari = $_POST['id_hari'];
    update($koneksi, 'hari', $data, ['id_hari' => $id_hari]);
}
if ($pg == 'tambah') {
    $data = [
        'nama_hari' => $_POST['nama_hari'],
        'jam_masuk'       => $_POST['jam_masuk'],
        'jam_keluar'       => $_POST['jam_keluar']
    ];
    insert($koneksi, 'hari', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_biaya = $_POST['id_hari'];
    delete($koneksi, 'hari', ['id_hari' => $id_hari]);
}
