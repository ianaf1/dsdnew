<form id="form-setting">
    <div class="card" id="settings-card">
        <div class="card-header">
            <h4>Pengaturan Aplikasi</h4>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="site-title" class="col-sm-2 col-form-label">Nama Sekolah</label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" name="nama" class="form-control" value="<?= $setting['nama_sekolah'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="site-title" class="col-sm-2 col-form-label">NPSN Sekolah</label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" name="npsn" class="form-control" value="<?= $setting['npsn'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="site-description" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                <div class="col-sm-6 col-md-9">
                    <textarea class="form-control" name="alamat"><?= $setting['alamat'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="site-title" class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" name="kota" class="form-control" value="<?= $setting['kota'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Logo Sekolah</label>
                <div class="col-sm-6 col-md-9">

                    <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="site-logo">
                        <label class="custom-file-label">Choose File</label>
                    </div>
                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-6 col-md-6">
                    <img src="../<?= $setting['logo'] ?>" class="img-thumbnail" width="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="site-description" class="col-sm-2 col-form-label">Text Klik Chat Daftar</label>
                <div class="col-sm-6 col-md-9">
                    <textarea class="form-control" name="klikchat"><?= $setting['klikchat'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="site-title" class="col-sm-2 col-form-label">No Wa Live Chat</label>
                <div class="col-sm-6 col-md-9">
                    <input type="text" name="nolivechat" class="form-control" value="<?= $setting['nolivechat'] ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="site-description" class="col-sm-2 col-form-label">Text Live Chat</label>
                <div class="col-sm-6 col-md-9">
                    <textarea class="form-control" name="livechat"><?= $setting['livechat'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-md-right">
            <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
            <button class="btn btn-secondary" type="button">Reset</button>
        </div>
    </div>
</form>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-setting').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_setting/crud_setting.php?pg=ubah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>