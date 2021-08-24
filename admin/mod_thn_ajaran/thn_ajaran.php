<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Tahun Ajaran</h5>
                </div>
                <div class="card-body">
                    <form id="form-tahunajaran">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-10">
                                <input type="text" name="thn_ajaran" class="form-control" value="<?= $tahun_ajaran_aktif['nama_thn_ajaran'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select class="form-control select2" style="width: 100%" name="id_semester" required>
                                <option value="">Pilih Semester</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from semester");
                                while ($semester = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $semester['id_semester'] ?>"><?= $semester['nama_semester'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-sm mt-2">Simpan Data Diri</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-tahunajaran').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_thn_ajaran/crud_thn_ajaran.php?pg=update',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Mantap, Sukses Guuyysss',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
            }
        });
        return false;
    });
</script>