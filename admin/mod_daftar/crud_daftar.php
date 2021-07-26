<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'asal_sekolah' => $_POST['asal'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'status' => $status
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'tambah') {
    $nama = str_replace("'", "`", $_POST['nama']);
    $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $data = [
        'nis' => $_POST['nis'],
        'nama' => ucwords(strtolower($nama)),
        'password' => $_POST['password'],
        'jenkel' => $_POST['jenkel'],
        'kelas' => $_POST['kelas'],
        'status' => '1',
        'foto' => 'default.png'

    ];
    $exec = insert($koneksi, 'daftar', $data);
    echo mysqli_error($koneksi);
}
if ($pg == 'hapus') {
    $id_daftar = $_POST['id_daftar'];
    delete($koneksi, 'daftar', ['id_daftar' => $id_daftar]);
}

if ($pg == 'batal') {

    $data = [
        'status' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    delete($koneksi, 'bayar', $where);
}
if ($pg == 'status') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $data = [
        'status' => $status
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, $where);
}
if ($pg == 'simpankelas') {
    $kelas = (isset($_POST['kelas']));
    $data = [
        'kelas'            => $_POST['kelas']
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

if ($pg == 'konfirmasi') {
        $$data = [];

        $exec = delete($koneksi, 'daftar', $data, ['id_daftar' => $id]);
        if ($exec) {
            $pesan = [
                'pesan' => 'Selamat.... Data Pensiswa Berhasil Dikosongkan'
            ];
            echo 'ok';
        } else {
            $pesan = [
                'pesan' => mysqli_error($koneksi)
            ];
            echo mysqli_error($koneksi);
        }
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
    
                mysqli_query($koneksi, "siswa");
                for ($i = 2; $i <= $hasildata; $i++) {
                    $nama_siswa = addslashes($data->val($i, 2));
                    $nisn = addslashes($data->val($i, 3));
                    $nis = $data->val($i, 4);
                    $warga_siswa = $data->val($i, 5);
                    $nik = addslashes($data->val($i, 6));
                    $tempat_lahir = addslashes($data->val($i, 7));
                    $tgl_lahir = addslashes($data->val($i, 8));
                    $jk = $data->val($i, 9);
                    $anak_ke = $data->val($i, 10);
                    $saudara = $data->val($i, 11);
                    $agama = $data->val($i, 12);
                    $cita = $data->val($i, 13);
                    $no_hp = addslashes($data->val($i, 14));
                    $email = $data->val($i, 15);
                    $hobi = $data->val($i, 16);
                    $status_tinggal_siswa = $data->val($i, 17);
                    $prov = $data->val($i, 18);
                    $kab = $data->val($i, 19);
                    $kec = $data->val($i, 20);
                    $desa = $data->val($i, 21);
                    $alamat_siswa = $data->val($i, 22);
                    $kordinat = $data->val($i, 23);
                    $kodepos_siswa = $data->val($i, 24);
                    $transportasi = $data->val($i, 25);
                    $jarak = $data->val($i, 26);
                    $waktu = $data->val($i, 27);
                    $biaya_sekolah = $data->val($i, 28);
                    $keb_khusus = $data->val($i, 29);
                    $keb_disabilitas = $data->val($i, 30);
                    $tk = $data->val($i, 31);
                    $paud = $data->val($i, 32);
                    $hepatitis = $data->val($i, 33);
                    $polio = $data->val($i, 34);
                    $bcg = $data->val($i, 35);
                    $campak = $data->val($i, 36);
                    $dpt = $data->val($i, 37);
                    $covid = $data->val($i, 38);
                    $no_kip = $data->val($i, 39);
                    $no_kks = $data->val($i, 40);
                    $no_pkh = $data->val($i, 41);
                    $no_kk = addslashes($data->val($i, 42));
                    $kepala_keluarga = $data->val($i, 43);
                    $nama_ayah = $data->val($i, 44);
                    $status_ayah = $data->val($i, 45);
                    $warga_ayah = $data->val($i, 46);
                    $nik_ayah = addslashes($data->val($i, 47));
                    $tempat_lahir_ayah = $data->val($i, 48);
                    $tgl_lahir_ayah = $data->val($i, 49);
                    $pendidikan_ayah = $data->val($i, 50);
                    $pekerjaan_ayah = $data->val($i, 51);
                    $penghasilan_ayah = $data->val($i, 52);
                    $no_hp_ayah = addslashes($data->val($i, 53));
                    $nama_ibu = $data->val($i, 54);
                    $status_ibu = $data->val($i, 55);
                    $warga_ibu = $data->val($i, 56);
                    $nik_ibu = addslashes($data->val($i, 57));
                    $tempat_lahir_ibu = $data->val($i, 58);
                    $tgl_lahir_ibu = $data->val($i, 59);
                    $pendidikan_ibu = $data->val($i, 60);
                    $pekerjaan_ibu = $data->val($i, 61);
                    $penghasilan_ibu = $data->val($i, 62);
                    $no_hp_ibu = addslashes($data->val($i, 63));
                    $nama_wali = $data->val($i, 64);
                    $warga_wali = $data->val($i, 65);
                    $nik_wali = addslashes($data->val($i, 64));
                    $tempat_lahir_wali = $data->val($i, 67);
                    $tgl_lahir_wali = $data->val($i, 68);
                    $pendidikan_wali = $data->val($i, 69);
                    $pekerjaan_wali = $data->val($i, 70);
                    $penghasilan_wali = $data->val($i, 71);
                    $no_hp_wali = addslashes($data->val($i, 72));
                    $tgl_siswa = $data->val($i, 73);;
                    $kelas = $data->val($i, 74);
                    $password = $data->val($i, 75);
    
                    if ($nama_siswa <> "") {
                        $datax = [
    
                            'nama' => strtoupper($nama_siswa),
                            'nisn' => $nisn,
                            'nis' => $nis,
                            'warga_siswa' => $warga_siswa,
                            'nik' => $nik,
                            'tempat_lahir' => $tempat_lahir,
                            'tgl_lahir' => $tgl_lahir,
                            'jenkel' => $jk,
                            'anak_ke' => $anak_ke,
                            'saudara' => $saudara,
                            'agama' => $agama,
                            'cita' => $cita,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'hobi' => $hobi,
                            'tinggal' => $status_tinggal_siswa,
                            'provinsi' => $prov,
                            'kota' => $kab,
                            'kecamatan' => $kec,
                            'desa' => $desa,
                            'alamat' => $alamat_siswa,
                            'koordinat' => $kordinat,
                            'kode_pos' => $kodepos_siswa,
                            'transportasi' => $transportasi,
                            'jarak' => $jarak,
                            'waktu' => $waktu,
                            'biaya_sekolah' => $biaya_sekolah,
                            'keb_khusus' => $keb_khusus,
                            'keb_disabilitas' => $keb_disabilitas,
                            'tk' => $tk,
                            'paud' => $paud,
                            'hepatitis_b' => $hepatitis,
                            'polio' => $polio,
                            'bcg' => $bcg,
                            'campak' => $campak,
                            'dpt' => $dpt,
                            'covid' => $covid,
                            'no_kip' => $no_kip,
                            'no_kks' => $no_kks,
                            'no_pkh' => $no_pkh,
                            'no_kk' => $no_kk,
                            'kepala_keluarga' => $kepala_keluarga,
                            'nama_ayah' => $nama_ayah,
                            'status_ayah' => $status_ayah,
                            'warga_ayah' => $warga_ayah,
                            'nik_ayah' => $nik_ayah,
                            'tempat_ayah' => $tempat_lahir_ayah,
                            'tgl_lahir_ayah' => $tgl_lahir_ayah,
                            'pendidikan_ayah' => $pendidikan_ayah,
                            'pekerjaan_ayah' => $pekerjaan_ayah,
                            'penghasilan_ayah' => $penghasilan_ayah,
                            'no_hp_ayah' => $no_hp_ayah,
                            'nama_ibu' => $nama_ibu,
                            'status_ibu' => $status_ibu,
                            'warga_ibu' => $warga_ibu,
                            'nik_ibu' => $nik_ibu,
                            'tempat_ibu' => $tempat_lahir_ibu,
                            'tgl_lahir_ibu' => $tgl_lahir_ibu,
                            'pendidikan_ibu' => $pendidikan_ibu,
                            'pekerjaan_ibu' => $pekerjaan_ibu,
                            'penghasilan_ibu' => $penghasilan_ibu,
                            'no_hp_ibu' => $no_hp_ibu,
                            'nama_wali' => $nama_wali,
                            'warga_wali' => $warga_wali,
                            'nik_wali' => $nik_wali,
                            'tempat_wali' => $tempat_lahir_wali,
                            'tgl_lahir_wali' => $tgl_lahir_wali,
                            'pendidikan_wali' => $pendidikan_wali,
                            'pekerjaan_wali' => $pekerjaan_wali,
                            'penghasilan_wali' => $penghasilan_wali,
                            'no_hp_wali' => $no_hp_wali,
                            // 'tgl_siswa' => $tgl_siswa,
                            'kelas' => $kelas,
                            'password' => $password,
                            'status' => 1
                        ];
                        $exec = insert($koneksi, 'daftar', $datax);
                        echo mysqli_error($koneksi);
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