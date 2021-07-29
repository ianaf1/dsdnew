<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_jenjang' => $_POST['nama'],
        'status' => $status
    ];
    $id_jenjang = $_POST['id_jenjang'];
    update($koneksi, 'jenjang', $data, ['id_jenjang' => $id_jenjang]);
}
if ($pg == 'tambah') {
    $data = [
        'id_kelas'     => $_POST['id'],
        'id_daftar'     => $_POST['id_daftar'],
        'nama_rombel'   => $_POST['nama_kelas'],
        'id_jenjang'     => $_POST['id_jenjang']
    ];
    $exec = insert($koneksi, 'rombel', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_jenjang = $_POST['id_jenjang'];
    delete($koneksi, 'jenjang', ['id_jenjang' => $id_jenjang]);
}
