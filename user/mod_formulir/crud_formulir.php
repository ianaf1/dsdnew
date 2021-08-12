<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];
if ($pg == 'simpandatadiri') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [

        'nis'               => $_POST['nis'],
        'password'          => $_POST['password'],
        'nisn'              => $_POST['nisn'],
        'nik'               => $_POST['nik'],
        'no_kk'             => $_POST['nokk'],
        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'asal_sekolah'      => $_POST['asal'],
        'status_keluarga'   => $_POST['status_keluarga'],
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

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
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

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
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
        'alamat_ayah'       => $_POST['alamat_ayah'],
        'desa_ayah'       => $_POST['desa_ayah'],
        'kec_ayah'       => $_POST['kec_ayah'],
        'kab_ayah'       => $_POST['kab_ayah'],
        'prov_ayah'       => $_POST['prov_ayah'],
        'kodepos_ayah'       => $_POST['kodepos_ayah'],
        'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
        'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
        'no_hp_ayah'          => $_POST['nohpayah'],
        'status_ibu'          => $_POST['status_ibu'],
        'nik_ibu'             => $_POST['nikibu'],
        'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
        'tempat_ibu'          => mysqli_escape_string($koneksi, $_POST['tempatibu']),
        'tgl_lahir_ibu'       => $_POST['tglibu'],
        'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
        'alamat_ibu'       => $_POST['alamat_ibu'],
        'desa_ibu'       => $_POST['desa_ibu'],
        'kec_ibu'       => $_POST['kec_ibu'],
        'kab_ibu'       => $_POST['kab_ibu'],
        'prov_ibu'       => $_POST['prov_ibu'],
        'kodepos_ibu'       => $_POST['kodepos_ibu'],
        'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
        'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
        'no_hp_ibu'           => $_POST['nohpibu'],
        'status_wali'            => $_POST['status_wali'],
        'nik_wali'            => $_POST['nikwali'],
        'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
        'tempat_wali'         => mysqli_escape_string($koneksi, $_POST['tempatwali']),
        'tgl_lahir_wali'      => $_POST['tglwali'],
        'pendidikan_wali'     => $_POST['pendidikan_wali'],
        'alamat_wali'       => $_POST['alamat_wali'],
        'desa_wali'       => $_POST['desa_wali'],
        'kec_wali'       => $_POST['kec_wali'],
        'kab_wali'       => $_POST['kab_wali'],
        'prov_wali'       => $_POST['prov_wali'],
        'kodepos_wali'       => $_POST['kodepos_wali'],
        'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
        'penghasilan_wali'    => $_POST['penghasilan_wali'],
        'no_hp_wali'          => $_POST['nohpwali'],
    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
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
