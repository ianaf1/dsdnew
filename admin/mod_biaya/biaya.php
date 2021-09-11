<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Biaya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control select2" style="width: 100%" name="id_kelas" required>
                                <option value="">Pilih Kelas</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from jenjang where status='1'");
                                while ($kelas = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $kelas['id_jenjang'] ?>"><?= $kelas['nama_jenjang'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Biaya</label>
                            <select class="form-control select2" style="width: 100%" name="kode_biaya" required>
                                <option value="">Kode Biaya</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from keu_pemasukan where status='1'");
                                while ($masuk = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $masuk['id_masuk'] ?>"><?= $masuk['id_masuk'] ?> <?= $masuk['nama_masuk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Biaya</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Rp</label>
                            <input type="text" name="jumlah" class="form-control" required="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Master Biaya</h5>
                    <div class="card-header-action">
                        <?php $query = mysqli_query($koneksi, "select sum(jumlah) as total from biaya");
                        $total = mysqli_fetch_array($query);
                        ?>
                        <button type="button" class="btn btn-icon icon-left btn-primary btn-sm" data-toggle="modal" data-target="#tambahdata">
                            <i class="far fa-edit"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="font-size: 14px" class="table table-bordered table-sm" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Nama Biaya</th>
                                    <th class="text-center">Jumlah Biaya</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from biaya a join semester b on a.id_semester=b.id_semester where a.id_semester='$semester_aktif[id_semester]' AND a.thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                $no = 0;
                                while ($biaya = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $biaya['id_kelas'] ?></td>
                                        <td><?= $biaya['nama_biaya'] ?></td>
                                        <td><?= "Rp. " . number_format($biaya['jumlah'], 0, ",", ".") ?></td>
                                        <td class="text-center"><?= $biaya['nama_semester'] ?></td>
                                        <td class="text-center">
                                            <button data-id="<?= $biaya['id_biaya'] ?>" class="hapus btn btn-sm btn-danger">Hapus</button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form id="form-edit<?= $no ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $biaya['id_biaya'] ?>" name="id_biaya" class="form-control" required="">
                                                                <div class="form-group">
                                                                    <label>Nama Biaya</label>
                                                                    <input type="text" name="nama" value="<?= $biaya['nama_biaya'] ?>" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jumlah Biaya Rp.</label>
                                                                    <input type="text" name="jumlah" value="<?= $biaya['jumlah'] ?>" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="control-label">Status biaya</div>
                                                                    <label class="custom-switch mt-2">
                                                                        <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($biaya['status'] == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description"> Pilih Status</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <script>
                                        $('#form-edit<?= $no ?>').submit(function(e) {
                                            e.preventDefault();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'mod_biaya/crud_biaya.php?pg=ubah',
                                                data: $(this).serialize(),
                                                success: function(data) {

                                                    iziToast.success({
                                                        title: 'OKee!',
                                                        message: 'Data Berhasil diubah',
                                                        position: 'topRight'
                                                    });
                                                    setTimeout(function() {
                                                        window.location.reload();
                                                    }, 2000);
                                                    $('#modal-edit<?= $no ?>').modal('hide');
                                                    //$('#bodyreset').load(location.href + ' #bodyreset');
                                                }
                                            });
                                            return false;
                                        });
                                    </script>
                                <?php }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_biaya/crud_biaya.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#dataTable').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_biaya/crud_biaya.php?pg=hapus',
                    method: "POST",
                    data: 'id_biaya=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>