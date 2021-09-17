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
        'nama_biaya' => $_POST['nama'],
        'jumlah'       => $_POST['jumlah'],
    ];
    $id_biaya = $_POST['id_biaya'];
    update($koneksi, 'biaya', $data, ['id_biaya' => $id_biaya]);
}
if ($pg == 'tambah') {
    $data = [
        'id_kelas'      => $_POST['id_kelas'],
        'kode_biaya'    => $_POST['kode_biaya'],
        'nama_biaya'    => $_POST['nama'],
        'jumlah'        => $_POST['jumlah'],
        'id_semester'   => $semester_aktif['id_semester'],
        'tahun'         => $tahun_aktif,
        'thn_ajaran'    => $tahun_ajaran_aktif['nama_thn_ajaran'],
        'status'        => 1
    ];
    $exec = insert($koneksi, 'biaya', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_biaya = $_POST['id_biaya'];
    delete($koneksi, 'biaya', ['id_biaya' => $id_biaya]);
}
