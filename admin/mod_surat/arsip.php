<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Surat</label>
                            <select class="form-control select2" style="width: 100%" name="id_master" required>
                                <option value="">Pilih Surat</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from s_master");
                                while ($s_master = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $s_master['id_master'] ?>"><?= $s_master['nama_surat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <select class="form-control select2" style="width: 100%" name="id_daftar">
                                <option value="">Pilih Siswa</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from daftar");
                                while ($siswa = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $siswa['id_daftar'] ?>"><?= $siswa['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <select class="form-control select2" style="width: 100%" name="id_ptk">
                                <option value="">Pilih Guru</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from ptk");
                                while ($guru = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $guru['id_ptk'] ?>"><?= $guru['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
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
                <h5 class="m-0 font-weight-bold text-primary">Arsip Surat</h5>
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
                                <th class="text-center">No Surat</th>
                                <th class="text-center">Kode Surat</th>
                                <th class="text-center">Nama Surat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from s_arsip");
                            $no = 0;
                            while ($arsip = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td class="text-center"><?= $arsip['no_surat'] ?></td>
                                    <td><?= $arsip['nama_masuk'] ?></td>
                                    <td><?= $arsip['nama_surat'] ?></td>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <a target="_blank" href="mod_bayar/export/suratpindah.php?id=<?= enkripsi($arsip['id_surat']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-print    "></i></a>
                                        <button data-id="<?= $arsip['id_surat'] ?>" class="hapus btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
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
            url: 'mod_surat/crud_surat.php?pg=tambahsurat',
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
                    url: 'mod_surat/crud_surat.php?pg=hapussurat',
                    method: "POST",
                    data: 'id_masuk=' + id,
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