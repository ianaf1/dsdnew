<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
// if ($pg == 'ubah') {
//     $status = (isset($_POST['status'])) ? 1 : 0;
//     $nama = str_replace("'", "`", $_POST['nama']);
//     $data = [
//         'nisn' => $_POST['nisn'],
//         'nama' => ucwords(strtolower($nama)),
//         'asal_sekolah' => $_POST['asal'],
//         'no_hp' => str_replace(" ", "", $_POST['nohp']),
//         'status' => $status
//     ];
//     $id_ptk = $_POST['id_ptk'];
//     update($koneksi, 'ptk', $data, ['id_ptk' => $id_ptk]);
// }
if ($pg == 'tambah') {
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nuptk' => $_POST['nuptk'],
        'nama' => ucwords(strtolower($nama)),
        'password' => $_POST['password'],
        //'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'foto' => 'default.png'

    ];
    $exec = insert($koneksi, 'ptk', $data);
    echo mysqli_error($koneksi);
}
if ($pg == 'hapus') {
    $id_ptk = $_POST['id_ptk'];
    delete($koneksi, 'ptk', ['id_ptk' => $id_ptk]);
}

if ($pg == 'batal') {

    $data = [
        'status' => 0
    ];
    $where = [
        'id_ptk' => $_POST['id_ptk']
    ];
    update($koneksi, 'ptk', $data, $where);
    delete($koneksi, 'bayar', $where);
}
if ($pg == 'status') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $data = [
        'status' => $status
    ];
    $where = [
        'id_ptk' => $_POST['id_ptk']
    ];
    $id_ptk = $_POST['id_ptk'];
    update($koneksi, 'ptk', $data, $where);
}
