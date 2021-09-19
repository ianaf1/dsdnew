<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();
if ($pg == 'presen') {
    $tgl = date('Ymd');
    $jam = date('h:i:s');
    $nis = mysqli_escape_string($koneksi, $_POST['nis']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis'");
    $siswaR = mysqli_fetch_array($siswaQ);
    $presensiQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis' AND tgl='$tgl'");
    $presensiR = mysqli_fetch_array($presensiQ);
    if (mysqli_num_rows($siswaQ) == 1) {
        if (mysqli_num_rows($presensiQ) < 1) {
            $data = [
                'nis' => $_POST['nis'],
                'tgl' => $tgl
            ];
            insert($koneksi, 'presensi', $data);
        }
    }
}
