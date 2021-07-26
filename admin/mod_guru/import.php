<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'import') {
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = explode('.', $file);
        $ext = end($ext);
        if ($ext <> 'xls') {
            echo "harap pilih file excel .xls";
        } else {
            $data = new Spreadsheet_Excel_Reader($temp);
            $hasildata = $data->rowcount($sheet_index = 0);
            $sukses = $gagal = 0;

            mysqli_query($koneksi, "update daftar");
            for ($i = 2; $i <= $hasildata; $i++) {
                $nis = $data->val($i, 2);
                $nama = addslashes($data->val($i, 3));
                $password = addslashes($data->val($i, 4));

                if ($nis <> "") {
                    $datax = [
                        'nis' => $nis,
                        'nama' => $nama,
                        'password' => $password,
                        //'status'         => 1
                    ];
                    $exec = insert($koneksi, 'daftar', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                }
            }
            $total = $hasildata - 1;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}
