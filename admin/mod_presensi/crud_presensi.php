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
        'jam_msk'         => $_POST['jam_msk'],
        'jam_plg'       => $_POST['jam_plg'],
        'ket'           => $_POST['ket']
    ];
    $id_presensi = $_POST['id_presensi'];
    update($koneksi, 'presensi', $data, ['id_presensi' => $id_presensi]);
}
if ($pg == 'hapus') {
    $id_presensi = $_POST['id_presensi'];
    delete($koneksi, 'presensi', ['id_presensi' => $id_presensi]);
}
