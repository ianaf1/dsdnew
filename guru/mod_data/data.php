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
                <!-- <div class="card-header-action">
                    <a target="_blank" href="mod_daftar/print_daftar.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Form</a>
                </div> -->
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
                        <h4>Data Diri</h4>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-datadiri">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NUPTK/NIP/PegID</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nuptk" readonly class="form-control" value="<?= $guru['nuptk'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="password" class="form-control" value="<?= $guru['password'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $guru['nama'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="nik" class="form-control" value="<?= $guru['nik'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tempat" class="form-control" value="<?= $guru['tempat_lahir'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $guru['tgl_lahir'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='jenkel' >
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($guru['jenkel'] == $val) { ?>
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
                                        <select class='form-control' name='agama' >
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($guru['agama'] == $val) { ?>
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
                                        <input type="number" name="nohp" class="form-control" value="<?= $guru['no_hp'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="ibu" class="form-control" value="<?= $guru['ibu'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
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
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_data/crud_data.php?pg=simpandatadiri',
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