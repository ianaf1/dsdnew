<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();
if ($pg == 'presen') {
    $tgl = date('Ymd');
    $hari = hari_ini();
    $hariini = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM hari where nama_hari = '$hari'"));
    $jam = date('H:i:s');
    $jam_msk = $hariini['jam_msk'];
    $jam_plg = $hariini['jam_keluar'];
    $nis = mysqli_escape_string($koneksi, $_POST['nis']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis'");
    $siswaR = mysqli_fetch_array($siswaQ);
    $presensiQ = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nis='$siswaR[nis]' AND tgl='$tgl'");
    $presensiR = mysqli_fetch_array($presensiQ);
    if (mysqli_num_rows($siswaQ) == 1) {
        if (mysqli_num_rows($presensiQ) == 0 && $jam < $jam_msk) {
            $data = [
                'nis' => $_POST['nis'],
                'nama' => $siswaR['nama'],
                'id_kelas' => $siswaR['id_kelas'],
                'tgl' => $tgl,
                'hari' => $hariini['nama_hari']
            ];
            $pesan = [
                'pesan' => 'masuk'
            ];
            echo json_encode($pesan);
            insert($koneksi, 'presensi', $data);
        } elseif (mysqli_num_rows($presensiQ) == 0 && $jam > $jam_msk) {
            $pesan = [
                'pesan' => 'ggl_masuk'
            ];
            echo json_encode($pesan);
        } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_plg'] == '00:00:00' && $jam > $jam_plg) {
            $data = [
                'jam_plg' => $jam,
                'ket' => 'Hadir'
            ];
            $pesan = [
                'pesan' => 'pulang'
            ];
            echo json_encode($pesan);
            update($koneksi, 'presensi', $data, ['nis' => $_POST['nis']]);
        } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $jam > $jam_msk && $jam < $jam_plg) {
            $pesan = [
                'pesan' => 'ggl_pulang'
            ];
            echo json_encode($pesan);
        } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $jam < $jam_msk) {
            $pesan = [
                'pesan' => 'sudah_absen'
            ];
            echo json_encode($pesan);
        } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $presensiR['jam_plg'] > '00:00:00') {
            $pesan = [
                'pesan' => 'sudah_presensi'
            ];
            echo json_encode($pesan);
        }
    } else {
        $pesan = [
            'pesan' => 'tdk_ditemukan'
        ];
        echo json_encode($pesan);
    }
}
