<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'simpandatadiri') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [

        'nis'               => $_POST['nis'],
        'password'          => $_POST['password'],
        'nisn'              => $_POST['nisn'],
        'nik'               => $_POST['nik'],
        'no_kk'             => $_POST['nokk'],
        'nama'              => $_POST['nama'],
        'tempat_lahir'      => $_POST['tempat'],
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'asal_sekolah'      => $_POST['asal'],
        'anak_ke'           => $_POST['anakke'],
        'saudara'           => $_POST['saudara'],
        'tinggi'            => $_POST['tinggi'],
        'berat'             => $_POST['berat'],
        'cita'              => $_POST['cita'],
        'hobi'              => $_POST['hobi'],
        'agama'             => $_POST['agama'],
        'no_kip'            => $_POST['kip'],
        'no_kks'            => $_POST['kks'],
        'no_pkh'            => $_POST['pkh'],
        'tk'                => $_POST['tk'],
        'paud'              => $_POST['paud'],
        'hepatitis_b'       => $_POST['hepatitis_b'],
        'bcg'               => $_POST['bcg'],
        'dpt'               => $_POST['dpt'],
        'polio'             => $_POST['polio'],
        'campak'            => $_POST['campak'],
        'covid'             => $_POST['covid']

    ];

    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    $exec = update($koneksi, 'daftar', $data, $where);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanalamat') {

    $data = [
        'alamat'            => mysqli_escape_string($koneksi, $_POST['alamat']),
        'rt'                => $_POST['rt'],
        'rw'                => $_POST['rw'],
        'koordinat'         => $_POST['koordinat'],
        'desa'              => mysqli_escape_string($koneksi, $_POST['desa']),
        'kecamatan'         => mysqli_escape_string($koneksi, $_POST['kecamatan']),
        'kota'              => mysqli_escape_string($koneksi, $_POST['kota']),
        'provinsi'          => mysqli_escape_string($koneksi, $_POST['provinsi']),
        'kode_pos'          => $_POST['kodepos'],
        'tinggal'           => $_POST['tinggal'],
        'jarak'             => $_POST['jarak'],
        'waktu'             => $_POST['waktu'],
        'transportasi'      => $_POST['transportasi']

    ];

    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];

    $exec = update($koneksi, 'daftar', $data, $where);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanortu') {

    $data = [
        'status_ayah'         => $_POST['status_ayah'],
        'nik_ayah'            => $_POST['nikayah'],
        'nama_ayah'           => mysqli_escape_string($koneksi, $_POST['namaayah']),
        'tempat_ayah'         => mysqli_escape_string($koneksi, $_POST['tempatayah']),
        'tgl_lahir_ayah'      => $_POST['tglayah'],
        'pendidikan_ayah'     => $_POST['pendidikan_ayah'],
        'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
        'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
        'no_hp_ayah'          => $_POST['nohpayah'],
        'status_ibu'          => $_POST['status_ibu'],
        'nik_ibu'             => $_POST['nikibu'],
        'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
        'tempat_ibu'          => mysqli_escape_string($koneksi, $_POST['tempatibu']),
        'tgl_lahir_ibu'       => $_POST['tglibu'],
        'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
        'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
        'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
        'no_hp_ibu'           => $_POST['nohpibu'],
        'nik_wali'            => $_POST['nikwali'],
        'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
        'tempat_wali'         => mysqli_escape_string($koneksi, $_POST['tempatwali']),
        'tgl_lahir_wali'      => $_POST['tglwali'],
        'pendidikan_wali'     => $_POST['pendidikan_wali'],
        'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
        'penghasilan_wali'    => $_POST['penghasilan_wali'],
        'no_hp_wali'          => $_POST['nohpwali'],
    ];

    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];

    $exec = update($koneksi, 'daftar', $data, $where);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}

if ($pg == 'simpankelas') {

    $data = [
        'kelas'            => mysqli_escape_string($koneksi, $_POST['kelas']),
    ];

    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];

    $exec = update($koneksi, 'daftar', $data, $where);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}