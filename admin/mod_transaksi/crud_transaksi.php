<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'tambahdebit') {
    $today = date("Ymd");
    $bulan = date('m');
    $query = "SELECT max(kode_transaksi) AS last FROM transaksi WHERE kode_transaksi LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $data = [
        'kode_transaksi'    => $nextNoTransaksi,
        'keterangan'        => $_POST['keterangan'],
        'id_masuk'          => $_POST['id_masuk'],
        'ref'               => $_POST['id_masuk'],
        'debit'             => str_replace(",", "", $_POST['debit']),
        'tgl_bayar'         => $_POST['tgl'],
        'id_user'           => $_SESSION['id_user'],
        'id_bulan'          => $_POST['id_bulan']

    ];
    $exec = insert($koneksi, 'transaksi', $data);
    echo $exec;
}
if ($pg == 'tambahkredit') {
    $today = date("Ymd");
    $bulan = date('m');

    // cari id transaksi terakhir yang berawalan tanggal hari ini
    $query = "SELECT max(id_transaksi) AS last FROM transaksi WHERE id_transaksi LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $data = [
        'kode_transaksi'    => $nextNoTransaksi,
        'keterangan'        => $_POST['keterangan'],
        'ref'               => $_POST['id_keluar'],
        'id_keluar'         => $_POST['id_keluar'],
        'kredit'            => str_replace(",", "", $_POST['kredit']),
        'tgl_bayar'         => $_POST['tgl'],
        'id_user'           => $_SESSION['id_user'],
        'id_bulan'          => $bulan

    ];
    $exec = insert($koneksi, 'transaksi', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_transaksi = $_POST['id_transaksi'];
    delete($koneksi, 'transaksi', ['id_transaksi' => $id_transaksi]);
}
