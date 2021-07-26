<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_ptk'];
if ($pg == 'simpandatadiri') {
    $data = [

        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
        'nuptk'             => $_POST["nuptk"],
        'password'          => $_POST["password"],
        'nik'               => $_POST['nik'],
        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'agama'             => $_POST['agama'],
        'ibu'               => $_POST['ibu'],

    ];

    $exec = update($koneksi, 'ptk', $data, ['id_ptk' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanalamat') {

    $data = [
        'sd'                => mysqli_escape_string($koneksi, $_POST['alamat']),
        'rt'                => $_POST['rt'],
        'rw'                => $_POST['rw'],
        'kelurahan'         => mysqli_escape_string($koneksi, $_POST['kelurahan']),
        'kecamatan'         => mysqli_escape_string($koneksi, $_POST['kecamatan']),
        'kota'              => mysqli_escape_string($koneksi, $_POST['kota']),
        'provinsi'          => mysqli_escape_string($koneksi, $_POST['provinsi']),
        'kode_pos'          => $_POST['kodepos'],
        'jarak'             => $_POST['jarak'],
        'waktu'             => $_POST['waktu'],
        'transportasi'      => $_POST['transportasi'],

    ];

    $exec = update($koneksi, 'ptk', $data, ['id_ptk' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanpendidikan') {

    $data = [
        'sd'                    => $_POST['sd'],
        'thn_masuk_sd'          => $_POST['thnmsksd'],
        'thn_lulus_sd'          => $_POST['thnllssd'],
        'pendidikan_terakhir'   => $_POST['pendidikan_terakhir'],
        'nama_perguruan'        => $_POST['namaperguruan'],
        'jurusan'               => $_POST['jurusan'],
        'alamat_perguruan'      => $_POST['alamat_perguruan'],
        'thn_masuk_perguruan'   => $_POST['thnmasuk'],
        'thn_lulus_perguruan'   => $_POST['thnlulus'],
        'gelar'                 => $_POST['gelar'],

    ];

    $exec = update($koneksi, 'ptk', $data, ['id_ptk' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
