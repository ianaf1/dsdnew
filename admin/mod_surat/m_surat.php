<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Master</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Surat</label>
                            <input type="text" name="kode_surat" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Surat</label>
                            <input type="text" name="nama_surat" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <div>
                                <select class='form-control' name='tipe_surat'>
                                    <option value=''>Pilih Jenis</option>
                                    <option value='1'>Siswa</option>
                                    <option value='2'>Guru</option>
                                </select>
                            </div>
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
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Master Surat</h5>
                <div class="card-header-action">
                    <button type="button" class="btn btn-icon icon-left btn-sm btn-primary" data-toggle="modal" data-target="#tambahdata">
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
                                    #
                                </th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Nama Surat</th>
                                <th class="text-center">Jenis Surat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from s_master");
                            $no = 0;
                            while ($s_master = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td class="text-center"><?= $s_master['kode_surat'] ?></td>
                                    <td><?= $s_master['nama_surat'] ?></td>
                                    <td class="text-center">
                                        <?php if ($s_master['tipe_surat'] == '1') { ?>
                                            <span class="badge badge-success">Siswa</span>
                                        <?php } elseif ($s_master['tipe_surat'] == '2') { ?>
                                            <span class="badge badge-danger">Guru</span>
                                        <?php } elseif ($s_master['tipe_surat'] == '3') { ?>
                                            <span class="badge badge-danger">Sekolah</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            Edit
                                        </button>
                                        <button data-id="<?= $s_master['id_master'] ?>" class="hapus btn btn-sm btn-danger">Hapus</button>

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
                                                            <input type="hidden" value="<?= $s_master['id_master'] ?>" name="id_master" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Nama Surat</label>
                                                                <input type="text" name="nama_surat" value="<?= $s_master['nama_surat'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tipe Surat</label>
                                                                <div>
                                                                    <select class='form-control' name='tipe'>
                                                                        <option value=''>Pilih Tipe</option>
                                                                        <option value='1'>Siswa</option>
                                                                        <option value='2'>Guru</option>
                                                                    </select>
                                                                </div>
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
                                            url: 'mod_surat/crud_surat.php?pg=ubahmaster',
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
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_surat/crud_surat.php?pg=tambahmaster',
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
                    url: 'mod_surat/crud_surat.php?pg=hapusmaster',
                    method: "POST",
                    data: 'id_master=' + id,
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