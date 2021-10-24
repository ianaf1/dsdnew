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
    $id = $_POST['id'];
    update($koneksi, 'mesin', $data, ['id' => $id]);
}
if ($pg == 'tambah') {
    $data = [
        'kode'         => $_POST['kode'],
        'nama'         => $_POST['nama'],
        'mode'       => $_POST['mode']
    ];
    insert($koneksi, 'mesin', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_biaya = $_POST['id'];
    delete($koneksi, 'mesin', ['id' => $id]);
}
