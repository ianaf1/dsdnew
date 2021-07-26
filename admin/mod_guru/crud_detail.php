<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'simpandatadiri') {
    $data = [

        'nuptk'             => $_POST['nuptk'],
        'password'          => $_POST['password'],
        'nik'               => $_POST['nik'],
        'nama'              => $_POST['nama'],
        'tempat_lahir'      => $_POST['tempat'],
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'satminkal'         => $_POST['satminkal'],
        'agama'             => $_POST['agama'],

    ];

    $where = [
        'id_ptk' => $_POST['id_ptk']
    ];
    $exec = update($koneksi, 'ptk', $data, $where);
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