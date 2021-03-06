<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $verifikasi = (isset($_POST['verifikasi'])) ? 1 : 0;
    $data = [
        'nama_bayar' => $_POST['nama'],
        'verifikasi' => $verifikasi
    ];
    $id_bayar = $_POST['id_bayar'];
    $excec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    echo $exec;
}
if ($pg == 'tambahtunggakan') {
    $data = [
        'id_daftar'     => $_POST['id_daftar'],
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        'id_semester'   => $_POST['id_semester'],
        'thn_ajaran'    => $_POST['thn_ajaran'],
        'keterangan'    => $_POST['keterangan']

    ];
    $exec = insert($koneksi, 'siswa_tunggakan', $data);
    echo $exec;
}
if ($pg == 'tambah') {
    $today = date("Ymd");
    $tahun = date('Y');

    // cari id transaksi terakhir yang berawalan tanggal hari ini
    $query = "SELECT max(kode_transaksi) AS last FROM transaksi WHERE kode_transaksi LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $data = [
        'id_bayar'      => $nextNoTransaksi,
        'id_daftar'     => $_POST['id'],
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'     => $_POST['tgl'],
        'id_user'       => $_SESSION['id_user'],
        'id_biaya'      => $_POST['id_biaya'],
        'keterangan'    => $_POST['keterangan'],
        'id_semester'   => $_POST['id_semester'],
        'thn_ajaran'    => $_POST['thn_ajaran'],
        'id_bulan'          => $_POST['id_bulan'],
        'verifikasi' => 1

    ];
    $data2 = [
        'kode_transaksi'    => $nextNoTransaksi,
        'id_daftar'         => $_POST['id'],
        'keterangan'        => $_POST['keterangan'],
        'id_masuk'          => $_POST['id_masuk'],
        'ref'               => $_POST['id_masuk'],
        'debit'             => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'         => $_POST['tgl'],
        'id_user'           => $_SESSION['id_user'],
        'id_bulan'          => $_POST['id_bulan'],
        'tahun'             => $tahun

    ];
    $exec = insert($koneksi, 'bayar', $data);
    $exec = insert($koneksi, 'transaksi', $data2);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];
    delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    delete($koneksi, 'transaksi', ['kode_transaksi' => $id_bayar]);
}
if ($pg == 'verifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 1
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}
if ($pg == 'batalverifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 0
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}
if ($pg == 'editbayar') {
    $id_bayar = $_POST['id_bayar'];
    $tahun = date('Y');
    $data = [
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'     => $_POST['tgl'],
        'id_biaya'      => $_POST['id_biaya'],
        'keterangan'        => $_POST['keterangan'],
        'id_bulan'          => $_POST['id_bulan'],
        'id_semester'   => $_POST['semester'],
        'thn_ajaran'    => $_POST['thn_ajaran']

    ];
    $data2 = [
        'id_daftar'         => $_POST['id_daftar'],
        'keterangan'        => $_POST['keterangan'],
        'id_masuk'          => $_POST['id_masuk'],
        'ref'               => $_POST['id_masuk'],
        'debit'             => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'         => $_POST['tgl'],
        'id_user'           => $_SESSION['id_user'],
        'id_bulan'          => $_POST['id_bulan'],
        'tahun'             => $tahun

    ];
    $exec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    $exec = update($koneksi, 'transaksi', $data2, ['kode_transaksi' => $id_bayar]);
    echo $exec;
}
