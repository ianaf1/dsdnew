<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Mesin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="number" name="kode" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="jam_msk" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Mode</label>
                            <input type="text" name="jam_keluar" class="form-control" required="">
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
                    <h5 class="m-0 font-weight-bold text-primary">Master Mesin</h5>
                    <div class="card-header-action">
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
                                    <th class="text-center">Kode Mesin</th>
                                    <th class="text-center">Nama Mesin</th>
                                    <th class="text-center">Mode</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from mesin");
                                $no = 0;
                                while ($mesin = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $mesin['kode'] ?></td>
                                        <td class="text-center"><?= $mesin['nama'] ?></td>
                                        <td class="text-center"><?= $mesin['mode'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form id="form-edit<?= $no ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Mesin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $mesin['id'] ?>" name="id" class="form-control" required="">
                                                                <div class="form-group">
                                                                    <label>Nama mesin</label>
                                                                    <input type="text" value="<?= $mesin['nama'] ?>" name="nama" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Mode</label>
                                                                    <input type="text" value="<?= $mesin['mode'] ?>" name="mode" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Kode Mesin</label>
                                                                    <input type="text" value="<?= $mesin['kode'] ?>" name="kode" class="form-control" required="">
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
                                                url: 'mod_rfid/crud_mesin.php?pg=ubah',
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
            url: 'mod_rfid/crud_mesin.php?pg=tambah',
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
                    url: 'mod_rfid/crud_mesin.php?pg=hapus',
                    method: "POST",
                    data: 'id=' + id,
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