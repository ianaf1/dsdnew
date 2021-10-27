<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");

if ($pg == 'ubah') {
    $data = [
        'nis'         => $_POST['nis'],
    ];
    $id = $_POST['id'];
    update($koneksi, 'rfid', $data, ['id' => $id]);
}
if ($pg == 'hapus') {
    $id = $_POST['id'];
    delete($koneksi, 'rfid', ['id' => $id]);
}
