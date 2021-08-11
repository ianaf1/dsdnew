<?php require "fungsi.php"; ?>
<div class="row">
    <div class="col-12 col-sm-8 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4><?= $siswa['nama'] ?></h4>
                <!--<div class="card-header-action">
                    <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Form</a>
                </div>-->
            </div>
            <div class="card-body">
                <div class="author-box-details">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Data Alamat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-datadiri">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nis" readonly class="form-control" value="<?= $siswa['nis'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="password" class="form-control" value="<?= $siswa['password'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-home    "></i> Data Diri Siswa</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NISN</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>">
                                    </div>
                                </div>

                                <!--<div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jurusan</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="jurusan" class="form-control" value="<?= $siswa['jurusan'] ?>" disabled>
                                    </div>
                                </div>-->
                                <!--<div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ukuran Baju</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="baju" class="form-control" value="<?= $siswa['baju'] ?>" placeholder="M/L/XL/XXL/XXXL" >
                                    </div>
                                </div>-->

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nik" class="form-control" value="<?= $siswa['nik'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No KK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nokk" class="form-control" value="<?= $siswa['no_kk'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jenkel'>
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($siswa['jenkel'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='agama'>
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($siswa['agama'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Handphone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="asal" class="form-control" value="<?= $siswa['asal_sekolah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Dalam Keluarga</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='status_keluarga'>
                                            <option value=''>Pilih</option>
                                            <option value='kandung'>Anak Kandung</option>
                                            <option value='angkat'>Anak Angkat</option>
                                            <option value='tiri'>Anak Tiri</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Anak Ke</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Saudara</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tinggi Badan (Cm)</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Berat Badan (Kg)</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="berat" class="form-control" value="<?= $siswa['berat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cita-cita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='cita'>
                                            <option value=''>Pilih Cita-cita</option>";
                                            <?php foreach ($cita as $val => $key) { ?>
                                                <?php if ($siswa['cita'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hobi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='hobi'>
                                            <option value=''>Pilih Hobi</option>";
                                            <?php foreach ($hobi as $val => $key) { ?>
                                                <?php if ($siswa['hobi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <h5><i class="fas fa-user    "></i> Pra Sekolah dan Imunisasi</h5>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah TK/RA</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='tk'>
                                            <option value=''></option>";
                                            <?php foreach ($tk as $val => $key) { ?>
                                                <?php if ($siswa['tk'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah PAUD</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='paud'>
                                            <option value=''></option>";
                                            <?php foreach ($paud as $val => $key) { ?>
                                                <?php if ($siswa['paud'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi Hepatitis B</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='hepatitis_b'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['hepatitis_b'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi BCG</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='bcg'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['bcg'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi DPT</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='dpt'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['dpt'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi Polio</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='polio'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['polio'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi Campak</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='campak'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['campak'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pernah Imunisasi Covid</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='covid'>
                                            <option value=''></option>";
                                            <?php foreach ($imun as $val => $key) { ?>
                                                <?php if ($siswa['covid'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <h5><i class="fa fa-id-card    "></i> Kepemilikan Kartu</h5>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No KIP</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kip" class="form-control" value="<?= $siswa['no_kip'] ?>" placeholder="kosongkan jika tidak punya KIP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No KKS</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kks" class="form-control" value="<?= $siswa['no_kks'] ?>" placeholder="kosongkan jika tidak punya KKS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No PKH</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="pkh" class="form-control" value="<?= $siswa['no_pkh'] ?>" placeholder="kosongkan jika tidak punya PKH">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data diri dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <form id="form-alamat">
                                <h5><i class="fas fa-home    "></i> Data Alamat</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">RT / RW</label>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>">
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-3">
                                        <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="desa" class="form-control" value="<?= $siswa['desa'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $siswa['kecamatan'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kota" class="form-control" value="<?= $siswa['kota'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="provinsi" class="form-control" value="<?= $siswa['provinsi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tinggal Bersama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='tinggal'>
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($siswa['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jarak Ke Sekolah/Madrasah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jarak'>
                                            <option value=''>Pilih Jarak</option>";
                                            <?php foreach ($jarak as $val) { ?>
                                                <?php if ($siswa['jarak'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Waktu Tempuh</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='waktu'>
                                            <option value=''>Pilih Waktu Tempuh</option>";
                                            <?php foreach ($waktu as $val) { ?>
                                                <?php if ($siswa['waktu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Transportasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='transportasi'>
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="form-orangtua">
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap Ayah</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Ayah Kandung</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='status_ayah'>
                                            <option value=''>Pilih Status Ayah</option>";
                                            <?php foreach ($status as $val) { ?>
                                                <?php if ($siswa['status_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempatayah" class="form-control" value="<?= $siswa['tempat_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tglayah" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ayah'>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat_ayah" class="form-control" value="<?= $siswa['alamat_ayah'] ?>" placeholder="Nama jalan / Kampung">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="desa_ayah" class="form-control" value="<?= $siswa['desa_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kec_ayah" class="form-control" value="<?= $siswa['kec_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kab_ayah" class="form-control" value="<?= $siswa['kab_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="prov_ayah" class="form-control" value="<?= $siswa['prov_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos_ayah" class="form-control" value="<?= $siswa['kodepos_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ayah'>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ayah'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No HP Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpayah" class="form-control" value="<?= $siswa['no_hp_ayah'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap ibu</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Ibu Kandung</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='status_ibu'>
                                            <option value=''>Pilih Status Ibu</option>";
                                            <?php foreach ($status as $val) { ?>
                                                <?php if ($siswa['status_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempatibu" class="form-control" value="<?= $siswa['tempat_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tglibu" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ibu'>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat_ibu" class="form-control" value="<?= $siswa['alamat_ibu'] ?>" placeholder="Nama jalan / Kampung">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="desa_ibu" class="form-control" value="<?= $siswa['desa_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kec_ibu" class="form-control" value="<?= $siswa['kec_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kab_ibu" class="form-control" value="<?= $siswa['kab_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="prov_ibu" class="form-control" value="<?= $siswa['prov_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos_ibu" class="form-control" value="<?= $siswa['kodepos_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ibu'>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ibu'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Hp Ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpibu" class="form-control" value="<?= $siswa['no_hp_ibu'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap wali</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nikwali" class="form-control" value="<?= $siswa['nik_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempatwali" class="form-control" value="<?= $siswa['tempat_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tglwali" class="datepicker form-control" value="<?= $siswa['tgl_lahir_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_wali'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat_wali" class="form-control" value="<?= $siswa['alamat_wali'] ?>" placeholder="Nama jalan / Kampung">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="desa_wali" class="form-control" value="<?= $siswa['desa_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kec_wali" class="form-control" value="<?= $siswa['kec_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kab_wali" class="form-control" value="<?= $siswa['kab_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="prov_wali" class="form-control" value="<?= $siswa['prov_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos_wali" class="form-control" value="<?= $siswa['kodepos_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_wali'>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_wali'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No HP wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nohpwali" class="form-control" value="<?= $siswa['no_hp_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-12 col-sm-4 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>STATUS PENGISIAN FORMULIR</h4>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            1
                        </div>
                        <div class="activity-detail">
                            <h5>Data Diri Siswa</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nisn               is  null and
                             nik                is  null and
                             no_kk              is  null and
                             nama               is  null and
                             tempat_lahir       is  null and
                             tgl_lahir          is  null and
                             jenkel             is  null and
                             agama              is  null and
                             no_hp              is  null and
                             asal_sekolah       is  null and
                             anak_ke            is  null and
                             saudara            is  null and
                             tinggi             is  null and
                             berat              is  null and
                             cita               is  null and
                             hobi               is  null
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            2
                        </div>
                        <div class="activity-detail">
                            <h5>Data Alamat Siswa</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             alamat                 is  null and
                             rt                     is  null and 
                             rw                     is  null and
                             desa                   is  null and
                             kecamatan              is  null and
                             kota                   is  null and
                             provinsi               is  null and
                             kode_pos               is  null and
                             tinggal                is  null and
                             jarak                  is  null and
                             waktu                  is  null and
                             transportasi           is  null
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            3
                        </div>
                        <div class="activity-detail">
                            <h5>Data Orang Tua</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nik_ayah                 is  null and
                             nama_ayah                     is  null and 
                             tempat_ayah                    is  null and
                             tgl_lahir_ayah                   is  null and
                             pendidikan_ayah              is  null and
                             pekerjaan_ayah                  is  null and
                             penghasilan_ayah              is  null and
                             nik_ibu                 is  null and
                             nama_ibu                     is  null and 
                             tempat_ibu                    is  null and
                             tgl_lahir_ibu                   is  null and
                             pendidikan_ibu              is  null and
                             pekerjaan_ibu                 is  null and
                             penghasilan_ibu              is  null 
                             
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</div>
<script>
    // $('.form-control').keyup(function(event) {

    //     $(this).val($(this).val().toUpperCase());
    // });
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpandatadiri',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanalamat',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-orangtua').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanortu',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        // $("#form-datadiri").validate({
        //     rules: {
        //         "b[firstname]": {
        //             : true
        //         },
        //         "b[email]": {
        //             : true,
        //             email: true
        //         },
        //         "book[contact]": {
        //             : true
        //         }
        //     },
        //     submitHandler: function(form) {
        //         var formData = $(form).serialize();
        //         alert(formData); // for demo
        //         // comment out ajax for demo
        //         /*
        //         $.ajax({
        //             url: "bs_client_function.php?action=new_b",
        //             type: "post",
        //             data: formData,
        //             beforeSend: function () {

        //             },
        //             success: function (data) {

        //             }
        //         });
        //         */
        //     }
        // });

    });
</script>