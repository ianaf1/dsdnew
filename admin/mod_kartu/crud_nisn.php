<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}

if ($pg == 'ubah') {
    $ektensi = ['jpg', 'jpeg', 'png'];
    if ($_FILES['desain_nisn']['name'] <> '') {
        $desain_nisn = $_FILES['desain_nisn']['name'];
        $temp = $_FILES['desain_nisn']['tmp_name'];
        $ext = explode('.', $desain_nisn);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/upload/desain/desain' . rand(1, 1000) . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'desain_nisn' => $dest
                ];
                $id = $_POST['id'];
                $exec = update($koneksi, 'desain', $data2, ['id' => $id]);
            } else {
                echo "gagal";
            }
        }
    }
} else {
    echo "Gagal menyimpan";
}
