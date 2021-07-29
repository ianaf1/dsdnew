<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="rombel">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="id" required>
                        <option value="">Cari Data Kelas</option>
                        <?php
                        $query = mysqli_query($koneksi, "select * from kelas where status='1'");
                        while ($kelas = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= enkripsi($kelas['id_kelas']) ?>"><?= $kelas['nama_kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                &nbsp;<button type="submit" class="btn btn-primary btn-xs-5 p-l-10"><i class="fas fa-search    "></i> Cari</button>
            </div>
        </div>
    </form>

</div>
<?php if (isset($_GET['id']) == '') { ?>
    <?php if ($user['level'] == 'admin' or $user['level'] == 'bendahara' or $user['level'] == 'kepala' or $user['level'] == 'operator') { ?>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Rombel</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="table-1" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Rombel</th>
                                        <th>Wali Kelas</th>
                                        <th>Jenjang</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select distinct from rombel a join kelas b ON a.id_kelas=b.id_kelas where b.status='1'");
                                    $no = 0;
                                    while ($rombel = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $rombel['nama_kelas'] ?></td>
                                            <td>Wali Kelas</td>
                                            <td><?= $rombel['id_jenjang'] ?></td>
                                            <td><?= mysqli_num_rows($rombel['nama_kelas']) ?></td>
                                            <td>
                                                <button data-id="<?= $rombel['id_kelas'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash-alt    "></i></button>
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
    <?php } ?>

<?php } else { ?>
    <?php $kelas = fetch($koneksi, 'kelas', ['id_kelas' => dekripsi($_GET['id'])]) ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'>Kelas <?= $kelas['nama_kelas'] ?></h5>
                    <div class="card-header-action">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="fas fa-plus-circle    "></i> Tambah Siswa
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambahdata" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-tambahdata">
                                    <div class="modal-body">
                                        <input type="hidden" value="<?= $kelas['id_kelas'] ?>" name="id">
                                        <input type="hidden" value="<?= $kelas['id_jenjang'] ?>" name="id_jenjang">
                                        <input type="hidden" value="<?= $kelas['nama_kelas'] ?>" name="nama_kelas">
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <select class="form-control select2" style="width: 100%" name="id_daftar" required>
                                                <option value="">Pilih Siswa</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from daftar where kelas = '$kelas[id_jenjang]' && status='1'");
                                                while ($siswa = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $siswa['id_daftar'] ?>"><?= $siswa['nama'] ?></option>
                                                <?php } ?>
                                            </select>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="table-2" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from rombel a join daftar b ON a.id_kelas=b.id_kelas where a.id_kelas=b.id_kelas=$kelas[id_kelas]");
                                $no = 0;
                                while ($rombel = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $rombel['nis'] ?></td>
                                        <td><?= $rombel['nama'] ?></td>
                                        <td><?= $rombel['jenkel'] ?></td>
                                        <td>
                                            <button data-id="<?= $rombel['id_rombel'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash    "></i></button>
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
<?php } ?>
<script>
    $('#form-tambahdata').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_rombel/crud_rombel.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {
                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
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
                    url: 'mod_rombel/crud_rombel.php?pg=hapus',
                    method: "POST",
                    data: 'id_rombel=' + id,
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
    $('#dataTable').on('click', '.cek', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan memverifikasi data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_rombel/crud_rombel.php?pg=verifikasi',
                    method: "POST",
                    data: 'id_rombel=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil diupdate',
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
    $('#table-1').on('click', '.hapus', function() {
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
                    url: 'mod_rombel/crud_rombel.php?pg=hapus',
                    method: "POST",
                    data: 'id_rombel=' + id,
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
    $('#table-1').on('click', '.batal', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan membatalkan verifikasi ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_rombel/crud_rombel.php?pg=batalverifikasi',
                    method: "POST",
                    data: 'id_rombel=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil diupdate',
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
    $('#table-2').on('click', '.hapus', function() {
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
                    url: 'mod_rombel/crud_rombel.php?pg=hapus',
                    method: "POST",
                    data: 'id_rombel=' + id,
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