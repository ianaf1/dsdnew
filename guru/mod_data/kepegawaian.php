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
                        <h4>Data Kepegawaian</h4>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-kepegawaian">
                                <!-- <h5><i class="fas fa-home    "></i> Data Kepegawaian</h5> -->
                                <div class="form-group row" id="kepegawaian">
                                    <label class="col-sm-2 col-form-label">Status Kepegawaian</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select id="status_kepegawaian" class='form-control' name='status_kepegawaian' >
                                            <option value=''>Pilih Status</option>";
                                            <?php foreach ($kepegawaian as $val) { ?>
                                                <?php if ($guru['status_kepegawaian'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="status_inpassing" name='inpassing' hidden>
                                    <label class="col-sm-2 col-form-label">Status Inpassing</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='status_inpassing'>
                                            <option value=''>Pilih Status</option>";
                                            <?php foreach ($inpassing as $val) { ?>
                                                <?php if ($guru['status_inpassing'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal TMT Inpassing</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tmt_inpassing" class="form-control datepicker" value="<?= $guru['tmt_inpassing'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Golongan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="golongan" class="form-control" value="<?= $guru['golongan'] ?>" placeholder="Golongan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TMT SK CPNS</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="tmt_cpns" class="form-control datepicker" value="<?= $guru['tmt_cpns'] ?>" placeholder="TMT SK CPNS" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TMT SK Awal</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="tmt_awal" class="form-control datepicker" value="<?= $guru['tmt_awal'] ?>" placeholder="TMT SK Inpassing" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">TMT SK TERAKHIR</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" name="tmt_cpns" class="form-control" value="<?= $guru['tmt_cpns'] ?>" placeholder="TMT SK TERAKHIR">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Instansi Yang Mengangkat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='instansi_pengangkat' >
                                            <option value=''>Pilih Instansi</option>";
                                            <?php foreach ($instansipengangkat as $val) { ?>
                                                <?php if ($guru['instansi_pengangkat'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Tempat Tugas</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='status_satminkal' >
                                            <option value=''>Pilih Status</option>";
                                            <?php foreach ($tempattugas as $val) { ?>
                                                <?php if ($guru['status_satminkal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Madrasah Satminkal</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="satminkal" class="form-control" value="<?= $guru['satminkal'] ?>">
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
        $('#form-kepegawaian').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_data/crud_data.php?pg=simpankepegawaian',
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