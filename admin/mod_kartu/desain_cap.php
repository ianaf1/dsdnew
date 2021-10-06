<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<section class='content'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-success'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DESAIN</h3>
                </div>
                <?php
                $b = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM setting WHERE id_setting = '1' order by id_setting"));
                ?>
                <div class='box-body'>
                    <div class="alert bg-red alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                        <div class="box-body">
                            Silahkan upload tanda tangan dan cap kepala Sekolah/Madrasah, dengan format (.png). Untuk Tandatangan gunakan ukuran 300 x 220 pixel. Untuk cap gunakan ukuran 300 x 300 pixel. </a>
                        </div>
                    </div>
                    <form id="form-desain">
                        <input type='hidden' name='id_setting' value='<?php echo "$b[id_setting]"; ?>'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Tanda Tangan Saat Ini:</label>
                                <div class='col-sm-6'>
                                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../<?= $b['ttd'] ?>" width="150px">
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Ganti Tanda Tangan Baru:</label>
                                <div class='col-sm-6'>
                                    <input type='file' class='form-control' name='ttd'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Cap Saat Ini:</label>
                                <div class='col-sm-6'>
                                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../<?= $b['cap'] ?>" width="150px">
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Ganti Cap Baru:</label>
                                <div class='col-sm-6'>
                                    <input type='file' class='form-control' name='cap'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Tanggal Kartu:</label>
                                <div class='col-sm-6'>
                                    <input type='date' class='form-control' name='tgl_kartu' value="<?php echo "$b[tgl_kartu]"; ?>">
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'></label>
                                <div class='col-sm-9'>
                                    <button style="width: 150px" type="submit" name="simpan" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> S I M P A N</button>
                                    <a href="home"><button style="width: 150px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
</section>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-desain').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_kartu/crud_cap.php?pg=ubah',
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
                    title: 'Jos . . . ',
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