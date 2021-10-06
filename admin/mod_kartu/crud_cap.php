<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

if ($pg == 'ubah') {
    $data = [

        'tgl_kartu' => $_POST['tgl_kartu']

    ];
    $where = [
        'id_setting' => 1
    ];
    $exec = update($koneksi, 'setting', $data, $where);
    echo mysqli_error($koneksi);


    $ektensi = ['jpg', 'jpeg', 'png'];
    if ($_FILES['cap']['name'] <> '') {
        $cap = $_FILES['cap']['name'];
        $temp = $_FILES['cap']['tmp_name'];
        $ext = explode('.', $cap);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/desain/cap' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'cap' => $dest
                ];
                $id_setting = $_POST['id_setting'];
                $exec = update($koneksi, 'setting', $data2, ['id_setting' => $id_setting]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['ttd']['name'] <> '') {
        $ttd = $_FILES['ttd']['name'];
        $temp = $_FILES['ttd']['tmp_name'];
        $ext = explode('.', $ttd);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/desain/ttd' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'ttd' => $dest
                ];
                $id_setting = $_POST['id_setting'];
                $exec = update($koneksi, 'setting', $data2, ['id_setting' => $id_setting]);
            } else {
                echo "gagal";
            }
        }
    }
} else {
    echo "Gagal menyimpan";
}
