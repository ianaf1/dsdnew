<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();
if ($pg == 'presen') {
    $tgl = date('Ymd');
    $bulan = date('m');
    $tahun = date('Y');
    $hari = hari_ini();
    $nis = mysqli_escape_string($koneksi, $_POST['nis']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar a join kelas b WHERE nis='$nis' AND a.id_kelas=b.id_kelas");
    $siswaR = mysqli_fetch_array($siswaQ);
    $hariini = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM hari where nama_hari = '$hari' AND kategori = '$siswaR[kategori]'"));
    $jam = date('H:i:s');
    $batas_jam = $hariini['jam_msk'] - '02:00:00';
    $jam_msk = $hariini['jam_msk'];
    $jam_plg = $hariini['jam_keluar'];
    $presensiQ = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nis='$siswaR[nis]' AND tgl='$tgl'");
    $presensiR = mysqli_fetch_array($presensiQ);
    if (mysqli_num_rows($siswaQ) == 1) {
        if (mysqli_num_rows($presensiQ) == 0 && $jam < $jam_msk) {
            $data = [
                'nis' => $_POST['nis'],
                'nama' => $siswaR['nama'],
                'id_kelas' => $siswaR['id_kelas'],
                'tgl' => $tgl,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'hari' => $hariini['nama_hari'],
                'ket'   => 'Bolos'
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
            update($koneksi, 'presensi', $data, ['id_presensi' => $presensiR['id_presensi']]);
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

// if ($pg == 'hostmode') {
//     $query = mysqli_query($koneksi, "SELECT mode FROM mesin");
//     $mode = mysqli_fetch_array($query);
//     $modemesin = $mode['mode'];
//     $pesan = [
//         'mode' => $modemesin
//     ];
//     header('Content-Type: application/json');
//     echo json_encode($pesan);
// }

// if ($pg == 'addmode') {
//     $rfid = $_GET['rfid'];
//     $query = mysqli_query($koneksi, "SELECT * FROM rfid WHERE uid ='$rfid'");
//     if (mysqli_num_rows($query) < 1) {
//         $data = [
//             'uid' => $rfid
//         ];
//         $pesan = [
//             'status' => 'ID Sukses Didaftarkan'
//         ];
//         insert($koneksi, 'rfid', $data);
//         header('Content-Type: application/json');
//         echo json_encode($pesan);
//     } else {
//         $pesan = [
//             'status' => 'ID Telah Terdaftar'
//         ];
//         header('Content-Type: application/json');
//         echo json_encode($pesan);
//     }
// }
// if ($pg == 'cekmode') {
//     $rfid = $_GET['rfid'];
//     $nis = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nis FROM rfid WHERE uid='$rfid'"));
//     $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis[nis]'");
//     $siswaR = mysqli_fetch_array($siswaQ);
//     if (mysqli_num_rows($siswaQ) > 0) {
//         $pesan = [
//             'status'   => $siswaR['nama']
//         ];
//         header('Content-Type: application/json');
//         echo json_encode($pesan);
//     } else {
//         $pesan = [
//             'status' => 'Tidak Terdaftar'
//         ];
//         header('Content-Type: application/json');
//         echo json_encode($pesan);
//     }
// }
// if ($pg == 'scanmode') {
//     $rfid = $_GET['rfid'];
//     $tgl = date('Ymd');
//     $bulan = date('m');
//     $tahun = date('Y');
//     $hari = hari_ini();
//     $hariini = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM hari where nama_hari = '$hari'"));
//     $jam = date('H:i:s');
//     $jam_msk = $hariini['jam_msk'];
//     $jam_plg = $hariini['jam_keluar'];
//     $nis = mysqli_fetch_array(mysqli_query($koneksi, "SELECT nis FROM rfid WHERE uid='$rfid'"));
//     $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$nis[nis]'");
//     $siswaR = mysqli_fetch_array($siswaQ);
//     $presensiQ = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nis='$siswaR[nis]' AND tgl='$tgl'");
//     $presensiR = mysqli_fetch_array($presensiQ);
//     if (mysqli_num_rows($siswaQ) == 1) {
//         if (mysqli_num_rows($presensiQ) == 0 && $jam < $jam_msk) {
//             $data = [
//                 'nis' => $nis['nis'],
//                 'nama' => $siswaR['nama'],
//                 'id_kelas' => $siswaR['id_kelas'],
//                 'tgl' => $tgl,
//                 'bulan' => $bulan,
//                 'tahun' => $tahun,
//                 'hari' => $hariini['nama_hari'],
//                 'ket'   => 'Bolos'
//             ];
//             $pesan = [
//                 'status' => 'Presensi Sukses',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//             insert($koneksi, 'presensi', $data);
//         } elseif (mysqli_num_rows($presensiQ) == 0 && $jam > $jam_msk) {
//             $pesan = [
//                 'status' => ' Presensi Gagal ',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//         } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_plg'] == '00:00:00' && $jam > $jam_plg) {
//             $data = [
//                 'jam_plg' => $jam,
//                 'ket' => 'Hadir'
//             ];
//             $pesan = [
//                 'status' => ' Pulang Sukses  ',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//             update($koneksi, 'presensi', $data, ['id_presensi' => $presensiR['id_presensi']]);
//         } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $jam > $jam_msk && $jam < $jam_plg) {
//             $pesan = [
//                 'status' => ' Blm Jam Pulang ',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//         } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $jam < $jam_msk) {
//             $pesan = [
//                 'status' => ' Sudah Presensi ',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//         } elseif (mysqli_num_rows($presensiQ) == 1 && $presensiR['jam_msk'] > '00:00:00' && $presensiR['jam_plg'] > '00:00:00') {
//             $pesan = [
//                 'status' => 'Sdh Presensi Plg',
//                 'nama'   => $siswaR['nama']
//             ];
//             header('Content-Type: application/json');
//             echo json_encode($pesan);
//         }
//     } else {
//         $pesan = [
//             'status' => 'Tidak Ditemukan'
//         ];
//         header('Content-Type: application/json');
//         echo json_encode($pesan);
//     }
// }
