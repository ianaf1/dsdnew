<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'update') {
    if ($_POST['id_semester'] != $semester_aktif['id_semester']) {
        $sem_aktif = [
            'is_active' => 1
        ];
        $sem_nonaktif = [
            'is_active' => 0
        ];
        $id_semester = $_POST['id_semester'];
        update($koneksi, 'semester', $sem_aktif, ['id_semester' => $id_semester]);
        update($koneksi, 'semester', $sem_nonaktif, ['id_semester' => $semester_aktif['id_semester']]);
    }
    $data = [
        'nama_thn_ajaran' => $_POST['thn_ajaran'],
        'thn_ajaran_aktif' => 1
    ];
    $thn_nonaktif = [
        'thn_ajaran_aktif' => 0
    ];
    update($koneksi, 'thn_ajaran', $thn_nonaktif, ['id_thn_ajaran' => $tahun_ajaran_aktif['id_thn_ajaran']]);
    insert($koneksi, 'thn_ajaran', $data);
}
