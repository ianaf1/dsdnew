<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $ptk = fetch($koneksi, 'ptk', ['id_ptk' => dekripsi($_GET['id'])]); ?>
    <!-- <div class="row"> -->
        <!-- <div class="col-12 col-sm-8 col-lg-12"> -->
            <div class="card">
                <div class="card-header">
                    <h4>Data Guru</h4>
                </div>
                <div class="card-body">
                    <div class="author-box-details">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                <form id="form-datadiri">
                                    <h5><i class="fas fa-home    "></i> Data Diri Guru</h5>
                                    <div class="form-group row">
                                        <!-- <label class="col-sm-2 col-form-label">Id</label> -->
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id_ptk" readonly class="form-control" value="<?= $ptk['id_ptk'] ?>" required>
                                        </div>
                                    </div>
                                    <!-- <div class="author-box-right">
                                        <img alt="image" src="../<?= $ptk['foto'] ?>" class="img-thumbnail" class="rounded-circle author-box-picture">
                                            <div class="clearfix"></div>
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input" id="foto" width="200">
                                                    <label class="custom-file-label">Pilih Foto</label>
                                                </div>
                                            </div> -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NUPTK/NIP/PegID</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nuptk" readonly class="form-control" value="<?= $ptk['nuptk'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control" value="<?= $ptk['password'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="<?= $ptk['nama'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nik" class="form-control" value="<?= $ptk['nik'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tempat" class="form-control" value="<?= $ptk['tempat_lahir'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tgl Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $ptk['tgl_lahir'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class='form-control' name='jenkel' >
                                                <option value=''>Pilih Jenis Kelamin</option>";
                                                <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                    <?php if ($ptk['jenkel'] == $val) { ?>
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
                                            <select class='form-control' name='agama' >
                                                <option value=''>Pilih Agama</option>";
                                                <?php foreach ($agama as $val) { ?>
                                                    <?php if ($ptk['agama'] == $val) { ?>
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
                                            <input type="number" name="nohp" class="form-control" value="<?= $ptk['no_hp'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satminkal</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="satminkal" class="form-control" value="<?= $ptk['satminkal'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>*Harap isi data pribadi dengan sebenar-benarnya</p>
                                        <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<script>
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_guru/crud_detail.php?pg=simpandatadiri',
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
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
</script>