<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();

$tgl = date('Ymd');
$jam = date('H:i:s');
$nis = mysqli_escape_string($koneksi, $_POST['nis']);
$cek_siswa = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis'");
$presensiQ = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nis='$nis' AND tgl='$tgl'");
$presensiR = mysqli_fetch_array($presensiQ);
if (mysqli_num_rows($cek_siswa) == 1) {
    if (mysqli_num_rows($presensiQ) < 1) {
        $data = [
            'nis' => $nis,
            'tgl' => $tgl,
            'jam_masuk' => $jam
        ];
        $pesan = [
            'pesan' => 'masuk'
        ];
        insert($koneksi, 'presensi', $data);
        echo json_encode($pesan);
    } else {
        $pesan = [
            'pesan' => 'ditolak'
        ];
        echo json_encode($pesan);
    }
    if (mysqli_num_rows($presensiQ) == 1 && $jam >= '13:00:00') {
        $data = [
            'jam_keluar' => $jam,
            'ket'        => 'Hadir'
        ];
        $pesan = [
            'pesan' => 'pulang'
        ];
        update($koneksi, 'presensi', $data, ['nis' => $_POST['nis']]);
        echo json_encode($pesan);
    } else {
        $pesan = [
            'pesan' => 'blm_pulang'
        ];
        echo json_encode($pesan);
    }
} else {
    $pesan = [
        'pesan' => 'tdk_ditemukan'
    ];
}
