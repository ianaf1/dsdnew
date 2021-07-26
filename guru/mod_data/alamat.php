<?php require "fungsi.php"; ?>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <?php
                if ($guru['jenkel']== 'L') {
                    $panggilan = 'Pak';
                } else {
                    $panggilan = 'Bu';
                }
                ?>
                <h4>Hai <?= $panggilan?> <?= $guru['nama'] ?>, Jangan Sampe Salah Isi ya <?= $panggilan ?></h4>
            </div>
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job"><?= $guru['nama'] ?></div>
                </div>
                <div class="author-box-details">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Pribadi</a>
                        </li> -->
                        <h4>Data Alamat</h4>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-alamat">
                                <!-- <h5><i class="fas fa-home    "></i> Data Alamat</h5> -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $guru['alamat'] ?>" placeholder="Nama Jalan / Kampung" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">RT / RW</label>
                                    <div class="col-sm-6 col-md-2">
                                        <input type="number" name="rt" class="form-control" value="<?= $guru['rt'] ?>" >
                                    </div>
                                    <div class="col-sm-6 col-md-2">
                                        <input type="number" name="rw" class="form-control" value="<?= $guru['rw'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kelurahan" class="form-control" value="<?= $guru['kelurahan'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $guru['kecamatan'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kota" class="form-control" value="<?= $guru['kota'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="provinsi" class="form-control" value="<?= $guru['provinsi'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $guru['kode_pos'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jarak Ke Sekolah/Madrasah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jarak' >
                                            <option value=''>Pilih Jarak</option>";
                                            <?php foreach ($jarak as $val) { ?>
                                                <?php if ($guru['jarak'] == $val) { ?>
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
                                       <select class='form-control' name='waktu' >
                                            <option value=''>Pilih Waktu Tempuh</option>";
                                            <?php foreach ($waktu as $val) { ?>
                                                <?php if ($guru['waktu'] == $val) { ?>
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
                                        <select class='form-control' name='transportasi' >
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($guru['transportasi'] == $val) { ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_data/crud_data.php?pg=simpanalamat',
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
    });
</script>