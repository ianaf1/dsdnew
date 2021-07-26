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
                <!-- <div class="author-box-left">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job"><?= $guru['nama'] ?></div>
                </div> -->
                <div class="author-box">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Pribadi</a>
                        </li> -->
                        <h4>Data Pendidikan</h4>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-pendidikan">
                                <!-- <h5><i class="fas fa-home    "></i> Data Pendidikan</h5> -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">SD</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="sd" class="form-control" value="<?= $guru['sd'] ?>" placeholder="Nama SD" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="thnmsksd" class="form-control" value="<?= $guru['thn_masuk_sd'] ?>" placeholder="Tahun Masuk SD" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun Lulus</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="thnllssd" class="form-control" value="<?= $guru['thn_lulus_sd'] ?>" placeholder="Tahun Lulus SD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_terakhir' >
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($guru['pendidikan_terakhir'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Sekolah/Perguruan Tinggi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaperguruan" class="form-control" value="<?= $guru['nama_perguruan'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jurusan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="jurusan" class="form-control" value="<?= $guru['jurusan'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat Sekolah/Perguruan Tinggi</label>
                                    <div for="site-description" class="col-sm-12 col-md-7">
                                    <textarea name="alamat_perguruan" class="form-control" ><?= $guru['alamat_perguruan'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="thnmasuk" class="form-control" value="<?= $guru['thn_masuk_perguruan'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun Lulus</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="thnlulus" class="form-control" value="<?= $guru['thn_lulus_perguruan'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gelar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="gelar" class="form-control" value="<?= $guru['gelar'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data pendidikan dengan sebenar-benarnya</p>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Pendidikan</button></center>
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
        $('#form-pendidikan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_data/crud_data.php?pg=simpanpendidikan',
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