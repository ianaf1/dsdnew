<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");

if ($pg == 'ubah') {
    $data = [
        'kode'         => $_POST['kode'],
        'nama'         => $_POST['nama'],
        'mode'       => $_POST['mode']
    ];
    $id_hari = $_POST['id_hari'];
    update($koneksi, 'hari', $data, ['id_hari' => $id_hari]);
}
if ($pg == 'tambah') {
    $data = [
        'kode'         => $_POST['kode'],
        'nama'         => $_POST['nama'],
        'mode'       => $_POST['mode']
    ];
    insert($koneksi, 'hari', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_biaya = $_POST['id_hari'];
    delete($koneksi, 'hari', ['id_hari' => $id_hari]);
}
