'<?php
    require("../../config/database.php");
    require("../../config/function.php");
    require("../../config/functions.crud.php");
    require("../../config/excel_reader.php");
    session_start();
    if (!isset($_SESSION['id_user'])) {
        die('Anda tidak diijinkan mengakses langsung');
    }
    if ($pg == 'simpan') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $email = str_replace("'", "`", $_POST['email']);
        $data = [
            'nama_siswa' => $_POST['nama_siswa'],
            'warga_siswa' => $_POST['warga_siswa'],
            'nisn' => $_POST['nisn'],
            'nis' => $_POST['nis'],
            'nik' => $_POST['nik'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'jk' => $_POST['jk'],
            'anak_ke' => $_POST['anak_ke'],
            'saudara' => $_POST['saudara'],
            'agama' => $_POST['agama'],
            'cita' => $_POST['cita'],
            'no_hp' => $_POST['no_hp'],
            'email' => $_POST['email'],
            'hobi' => $_POST['hobi'],
            'status_tinggal_siswa' => $_POST['status_tinggal_siswa'],
            'prov' => $_POST['prov'],
            'kab' => $_POST['kab'],
            'kec' => $_POST['kec'],
            'desa' => $_POST['desa'],
            'alamat_siswa' => $_POST['alamat_siswa'],
            'kordinat' => $_POST['kordinat'],
            'kodepos_siswa' => $_POST['kodepos_siswa'],
            'transportasi' => $_POST['transportasi'],
            'jarak' => $_POST['jarak'],
            'waktu' => $_POST['waktu'],
            'biaya_sekolah' => $_POST['biaya_sekolah'],
            'keb_khusus' => $_POST['keb_khusus'],
            'keb_disabilitas' => $_POST['keb_disabilitas'],
            'tk' => $_POST['tk'],
            'paud' => $_POST['paud'],
            'hepatitis' => $_POST['hepatitis'],
            'polio' => $_POST['polio'],
            'bcg' => $_POST['bcg'],
            'campak' => $_POST['campak'],
            'dpt' => $_POST['dpt'],
            'covid' => $_POST['covid'],
            'no_kip' => $_POST['no_kip'],
            'no_kks' => $_POST['no_kks'],
            'no_pkh' => $_POST['no_pkh'],
            'no_kk' => $_POST['no_kk'],
            'kepala_keluarga' => $_POST['kepala_keluarga']

        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'dataayah') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_ayah' => $_POST['nama_ayah'],
            'status_ayah' => $_POST['status_ayah'],
            'warga_ayah' => $_POST['warga_ayah'],
            'nik_ayah' => $_POST['nik_ayah'],
            'tempat_lahir_ayah' => $_POST['tempat_lahir_ayah'],
            'tgl_lahir_ayah' => $_POST['tgl_lahir_ayah'],
            'pendidikan_ayah' => $_POST['pendidikan_ayah'],
            'pekerjaan_ayah' => $_POST['pekerjaan_ayah'],
            'penghasilan_ayah' => $_POST['penghasilan_ayah'],
            'no_hp_ayah' => $_POST['no_hp_ayah'],
            'domisili_ayah' => $_POST['domisili_ayah'],
            'status_tmp_tinggal_ayah' => $_POST['status_tmp_tinggal_ayah'],
            'prov_ayah' => $_POST['prov_ayah'],
            'kab_ayah' => $_POST['kab_ayah'],
            'kec_ayah' => $_POST['kec_ayah'],
            'desa_ayah' => $_POST['desa_ayah'],
            'alamat_ayah' => $_POST['alamat_ayah'],
            'kodepos_ayah' => $_POST['kodepos_ayah']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'dataibu') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_ibu' => $_POST['nama_ibu'],
            'status_ibu' => $_POST['status_ibu'],
            'warga_ibu' => $_POST['warga_ibu'],
            'nik_ibu' => $_POST['nik_ibu'],
            'tempat_lahir_ibu' => $_POST['tempat_lahir_ibu'],
            'tgl_lahir_ibu' => $_POST['tgl_lahir_ibu'],
            'pendidikan_ibu' => $_POST['pendidikan_ibu'],
            'pekerjaan_ibu' => $_POST['pekerjaan_ibu'],
            'penghasilan_ibu' => $_POST['penghasilan_ibu'],
            'no_hp_ibu' => $_POST['no_hp_ibu'],
            'status_tinggal_ibu' => $_POST['status_tinggal_ibu'],
            'domisili_ibu' => $_POST['domisili_ibu'],
            'status_tmp_tinggal_ibu' => $_POST['status_tmp_tinggal_ibu'],
            'prov_ibu' => $_POST['prov_ibu'],
            'kab_ibu' => $_POST['kab_ibu'],
            'kec_ibu' => $_POST['kec_ibu'],
            'desa_ibu' => $_POST['desa_ibu'],
            'alamat_ibu' => $_POST['alamat_ibu'],
            'kodepos_ibu' => $_POST['kodepos_ibu']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'datawali') {
        $status = (isset($_POST['status'])) ? 1 : 0;
        $data = [
            'nama_wali' => $_POST['nama_wali'],
            'status_wali' => $_POST['status_wali'],
            'warga_wali' => $_POST['warga_wali'],
            'nik_wali' => $_POST['nik_wali'],
            'tempat_lahir_wali' => $_POST['tempat_lahir_wali'],
            'tgl_lahir_wali' => $_POST['tgl_lahir_wali'],
            'pendidikan_wali' => $_POST['pendidikan_wali'],
            'pekerjaan_wali' => $_POST['pekerjaan_wali'],
            'penghasilan_wali' => $_POST['penghasilan_wali'],
            'no_hp_wali' => $_POST['no_hp_wali'],
            'domisili_wali' => $_POST['domisili_wali'],
            'prov_wali' => $_POST['prov_wali'],
            'kab_wali' => $_POST['kab_wali'],
            'kec_wali' => $_POST['kec_wali'],
            'desa_wali' => $_POST['desa_wali'],
            'alamat_wali' => $_POST['alamat_wali'],
            'kodepos_wali' => $_POST['kodepos_wali']


        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, ['id_siswa' => $id_siswa]);
    }

    if ($pg == 'konfirmasi') {
        $$data = [];

        $exec = delete($koneksi, 'siswa', $data, ['id_siswa' => $id]);
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


    if ($pg == 'status') {
        $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
        $data = [

            'status' => $status
        ];
        $where = [
            'id_siswa' => $_POST['id_siswa']
        ];
        $id_siswa = $_POST['id_siswa'];
        update($koneksi, 'siswa', $data, $where);
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

                            'nama_siswa' => strtoupper($nama_siswa),
                            'nisn' => $nisn,
                            'nis' => $nis,
                            'warga_siswa' => $warga_siswa,
                            'nik' => $nik,
                            'tempat_lahir' => $tempat_lahir,
                            'tgl_lahir' => $tgl_lahir,
                            'jk' => $jk,
                            'anak_ke' => $anak_ke,
                            'saudara' => $saudara,
                            'agama' => $agama,
                            'cita' => $cita,
                            'no_hp' => $no_hp,
                            'email' => $email,
                            'hobi' => $hobi,
                            'status_tinggal_siswa' => $status_tinggal_siswa,
                            'prov' => $prov,
                            'kab' => $kab,
                            'kec' => $kec,
                            'desa' => $desa,
                            'alamat_siswa' => $alamat_siswa,
                            'kordinat' => $kordinat,
                            'kodepos_siswa' => $kodepos_siswa,
                            'transportasi' => $transportasi,
                            'jarak' => $jarak,
                            'waktu' => $waktu,
                            'biaya_sekolah' => $biaya_sekolah,
                            'keb_khusus' => $keb_khusus,
                            'keb_disabilitas' => $keb_disabilitas,
                            'tk' => $tk,
                            'paud' => $paud,
                            'hepatitis' => $hepatitis,
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
                            'tempat_lahir_ayah' => $tempat_lahir_ayah,
                            'tgl_lahir_ayah' => $tgl_lahir_ayah,
                            'pendidikan_ayah' => $pendidikan_ayah,
                            'pekerjaan_ayah' => $pekerjaan_ayah,
                            'penghasilan_ayah' => $penghasilan_ayah,
                            'no_hp_ayah' => $no_hp_ayah,
                            'nama_ibu' => $nama_ibu,
                            'status_ibu' => $status_ibu,
                            'warga_ibu' => $warga_ibu,
                            'nik_ibu' => $nik_ibu,
                            'tempat_lahir_ibu' => $tempat_lahir_ibu,
                            'tgl_lahir_ibu' => $tgl_lahir_ibu,
                            'pendidikan_ibu' => $pendidikan_ibu,
                            'pekerjaan_ibu' => $pekerjaan_ibu,
                            'penghasilan_ibu' => $penghasilan_ibu,
                            'no_hp_ibu' => $no_hp_ibu,
                            'nama_wali' => $nama_wali,
                            'warga_wali' => $warga_wali,
                            'nik_wali' => $nik_wali,
                            'tempat_lahir_wali' => $tempat_lahir_wali,
                            'tgl_lahir_wali' => $tgl_lahir_wali,
                            'pendidikan_wali' => $pendidikan_wali,
                            'pekerjaan_wali' => $pekerjaan_wali,
                            'penghasilan_wali' => $penghasilan_wali,
                            'no_hp_wali' => $no_hp_wali,
                            'tgl_siswa' => $tgl_siswa,
                            'kelas' => $kelas,
                            'password' => $password,
                            'status' => 1
                        ];
                        $exec = insert($koneksi, 'siswa', $datax);
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

    if ($pg == 'tambah') {
        $nama = str_replace("'", "`", $_POST['nama']);
        $data = [

            'nisn' => $_POST['nisn'],
            'nama_siswa' => ucwords(strtolower($nama)),
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['jurusan'],
            'password' => $_POST['password'],
            'status' => '1',
            'foto' => 'default.png'

        ];
        $exec = insert($koneksi, 'siswa', $data);
        echo mysqli_error($koneksi);
    }
    if ($pg == 'hapus') {
        $id_siswa = $_POST['id_siswa'];
        delete($koneksi, 'siswa', ['id_siswa' => $id_siswa]);
    }
