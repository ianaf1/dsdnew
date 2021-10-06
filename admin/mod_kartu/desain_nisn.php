<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<section class='content'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='box box-success'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DESAIN</h3>
                </div>
                <?php
                $b = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM desain WHERE id = '1' order by id"));
                ?>
                <div class='box-body'>
                    <div class="alert bg-green alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                        <div class="box-body">
                            Untuk membuat template/desain desain kartu baru silahkan gunakanah ukuran W: 1020 Pixel x H: 315 Pixel.<br>Ukuran adalah ukuran standard kartu id card 3.375″ x 2.125″ (85.6 x 54 mm) yang paling banyak digunakan.<br>
                            untuk contoh desain silahkan dowload <a target="blank" href="../assets/img/nisn.png">disini</a>
                        </div>
                    </div>
                    <form id="form-desain">
                        <input type='hidden' name='id' value='<?php echo "$b[id]"; ?>'>
                        <div class='box-body'>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Desain Saat Ini:</label>
                                <div class='col-sm-6'>
                                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../<?= $b['desain_nisn'] ?>" width="5300px">
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'>Ganti Desain Baru:</label>
                                <div class='col-sm-6'>
                                    <input type='file' class='form-control' name='desain_nisn'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label class='col-sm-3 control-label'></label>
                                <div class='col-sm-9'>
                                    <button style="width: 150px" type="submit" id="save-btn" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> S I M P A N</button>
                                    <a href=""><button style="width: 150px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
            url: 'mod_kartu/crud_nisn.php?pg=ubah',
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