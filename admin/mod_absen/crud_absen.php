<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();
if ($pg == 'presen') {

    $nis = mysqli_escape_string($koneksi, $_POST['nis']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis'");
    $siswaR = mysqli_fetch_array($siswaQ);

    if (mysqli_num_rows($siswaQ) == 1) {
        $data = [
            'nis' => $_POST['nis']
        ];
        insert($koneksi, 'presensi', $data);
    }
}
