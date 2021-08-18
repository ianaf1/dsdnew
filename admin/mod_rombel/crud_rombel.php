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
        'id_kelas'     => $_POST['id'],
        'id_daftar'     => $_POST['id_daftar'],
        'nama_rombel'   => $_POST['nama_kelas'],
        'id_jenjang'     => $_POST['id_jenjang'],
    ];
    $data2 = [
        'id_kelas'     => $_POST['id'],
    ];
    $id_daftar = $_POST['id_daftar'];
    $exec = insert($koneksi, 'rombel', $data);
    $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id_daftar]);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_rombel = $_POST['id_rombel'];
    $id_daftar = $_POST['id_daftar'];
    $id_kelas = '';
    update($koneksi, 'daftar', $id_kelas, ['id_daftar' => $id_daftar]);
    delete($koneksi, 'rombel', ['id_rombel' => $id_rombel]);
}
