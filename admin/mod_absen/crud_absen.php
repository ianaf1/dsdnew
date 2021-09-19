<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
// session_start();
// // if (!isset($_SESSION['id_user'])) {
// //     die('Anda tidak diijinkan mengakses langsung');
// // }
if ($pg == 'presen') {
    $data = [
        'nis' => $_POST['nis'],
    ];
}
