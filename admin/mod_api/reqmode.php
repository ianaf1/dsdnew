<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");

if (function_exists($_GET['function'])) {
    $_GET['function']();
}
function get_mesin()
{
    global $koneksi;
    $query = $koneksi->query("SELECT mode FROM mesin");
    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }
    $response = array(
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}
