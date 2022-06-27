<!-- <?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?> -->
<?php
$sql = mysqli_query($koneksi, "select max(nis) as maxID from daftar");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$nourut = (int) substr($kode, 14, 4);
$nourut++;
$ket = "131236010019";
$th = "22";
$nisbaru = $ket . $th . sprintf("%04s", $nourut);

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="row">
    <div class="col-12 col-sm-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
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
                                    <div class="col-sm-10">
                                        <input type="text" name="nis" readonly class="form-control" value="<?= $nisbaru ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="password" class="form-control" value="<?= $nisbaru ?> required=""">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NISN</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nisn" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="nik" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No KK</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="nokk" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tempat" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tgllahir" class="form-control datepicker" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='jenkel' required="">
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($daftar['jenkel'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <select class='form-control' name='agama' required="">
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($daftar['agama'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <input type="number" name="nohp" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sekolah Asal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="asal" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Anak Ke</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="anakke" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Saudara</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="saudara" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tinggi Badan (Cm)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="tinggi" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Berat Badan (Kg)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="berat" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cita-cita</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='cita' required="">
                                            <option value=''>Pilih Cita-cita</option>";
                                            <?php foreach ($cita as $val => $key) { ?>
                                                <?php if ($daftar['cita'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <select class='form-control' name='hobi' required="">
                                            <option value=''>Pilih Hobi</option>";
                                            <?php foreach ($hobi as $val => $key) { ?>
                                                <?php if ($daftar['hobi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <h5><i class="fas fa-user"></i>ALAMAT</h5>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" placeholder="Nama Jalan / Kampung" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="desa" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kecamatan" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kota" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="provinsi" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="kodepos" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Tempat Tinggal</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='tinggal' required="">
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($daftar['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <h5><i class="fas fa-user    "></i>ORANG TUA/WALI</h5>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Ayah Kandung</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='status_ayah' required="">
                                            <option value=''>Pilih Status Ayah</option>";
                                            <?php foreach ($status as $val) { ?>
                                                <?php if ($daftar['status_ayah'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <input type="number" name="nikayah" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namaayah" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tempatayah" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tglayah" class="datepicker form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan Ayah</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='pendidikan_ayah' required="">
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($daftar['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='pekerjaan_ayah' required="">
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($daftar['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Penghasilan Ayah</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='penghasilan_ayah' required="">
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($daftar['penghasilan_ayah'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <input type="number" name="nohpayah" class="form-control" required="">
                                    </div>
                                </div>
                                <h5> Data Lengkap ibu</h5>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Ibu Kandung</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='status_ibu' required="">
                                            <option value=''>Pilih Status Ibu</option>";
                                            <?php foreach ($status as $val) { ?>
                                                <?php if ($daftar['status_ibu'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <input type="number" name="nikibu" class="form-control" value="<?= $daftar['nik_ibu'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $daftar['nama_ibu'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tempatibu" class="form-control" value="<?= $daftar['tempat_ibu'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tglibu" class="datepicker form-control" value="<?= $daftar['tgl_lahir_ibu'] ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='pendidikan_ibu' required="">
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($daftar['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select class='form-control' name='pekerjaan_ibu' required="">
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($daftar['pekerjaan_ibu'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <select class='form-control' name='penghasilan_ibu' required="">
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($daftar['penghasilan_ibu'] == $val) { ?>
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
                                    <div class="col-sm-10">
                                        <input type="number" name="nohpibu" class="form-control" value="<?= $daftar['no_hp_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data Pribadi dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.form-control').keyup(function(event) {

        $(this).val($(this).val().toUpperCase());
    });
    //$(document).ready(function() {
    $('#form-datadiri').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/mod_tambah_siswa/crud_tambah_siswa.php?pg=simpan',
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
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: json,
                        position: 'topCenter'
                    });
                }
                $('#bodyreset').load(location.href + ' #bodyreset');
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

    //});
</script>