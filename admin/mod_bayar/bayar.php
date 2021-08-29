<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="bayar">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="id" required>
                        <option value="">Cari Data Pendaftar</option>
                        <?php
                        $query = mysqli_query($koneksi, "select * from daftar where status='1'");
                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= enkripsi($siswa['id_daftar']) ?>"><?= $siswa['nis'] ?> <?= $siswa['nama'] ?></option>
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
    <?php if ($user['level'] == 'admin' or $user['level'] == 'bendahara' or $user['level'] == 'kepala') { ?>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Tunggakan Siswa</h5>
                        <div class="card-header-action">
                            <a class="btn btn-primary" href="mod_bayar/export_bayar.php" role="button"> Download Excel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="dataTable" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Tunggakan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select id_daftar, nama, kelas from daftar where status='1'");
                                    $q2 = mysqli_query($koneksi, "select sum(jumlah) as total from biaya where id_kelas='$daftar[kelas]' && id_semester!='$semester_aktif[id_semester]' && thn_ajaran!='$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                    $q3 = mysqli_query($koneksi, "select sum(jumlah) as total from siswa_tunggakan where id_daftar='$daftar[id_daftar]'");
                                    $q4 = mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' && id_biaya='L'");
                                    while ($daftar = mysqli_fetch_array($query)
                                        || $tunggakansiswa = mysqli_fetch_array($q3)
                                        || $biayasiswa = mysqli_fetch_array($q2)
                                        || $siswabayar = mysqli_fetch_array($q4)
                                    ) {
                                        // if ($biayasiswa['total'] == null) {
                                        //     $biayasiswa['total'] = "0";
                                        // } else {
                                        //     $biayasiswa['total'];
                                        // }
                                        // if ($tunggakansiswa['total']  == null) {
                                        //     $tunggakansiswa['total'] = "0";
                                        // } else {
                                        //     $tunggakansiswa['total'];
                                        // }
                                        // if ($siswabayar['total'] == null) {
                                        //     $siswabayar['total'] = "0";
                                        // } else {
                                        //     $siswabayar['total'];
                                        // }
                                        $totaltunggakan = $biayasiswa['total'] + $tunggakansiswa['total'] - $siswabayar['total'];
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $daftar['nama'] ?></td>
                                            <td><?= "Rp " . number_format($totaltunggakan, 0, ",", ".") ?></td>
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
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Sudah Verifikasi</h5>
                        <!-- <div class="card-header-action">
                        <a class="btn btn-primary" href="mod_bayar/export_bayar.php" role="button"> Download Excel</a>
                    </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="table-1" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tgl Bayar</th>
                                        <th>Penerima</th>
                                        <th>verifikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($koneksi, "select * from bayar a join daftar b ON a.id_daftar=b.id_daftar where a.verifikasi='1'");
                                    $no = 0;
                                    while ($bayar = mysqli_fetch_array($query)) {
                                        $user = fetch($koneksi, 'user', ['id_user' => $bayar['id_user']]);
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $bayar['id_bayar'] ?></td>
                                            <td><?= $bayar['nama'] ?></td>
                                            <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>
                                            <td><?= $bayar['tgl_bayar'] ?></td>
                                            <td><?php if ($user) {
                                                    echo $user['nama_user'];
                                                } else {
                                                    echo "Online";
                                                } ?>
                                            </td>

                                            <td>
                                                <?php if ($bayar['verifikasi'] == 1) { ?>
                                                    <span class="badge badge-success">Sudah Dicek</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-warning">Belum Dicek</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <button data-id="<?= $bayar['id_bayar'] ?>" class="batal btn btn-danger btn-sm"><i class="fas fa-times-circle    "></i></button>
                                                <!-- <a target="_blank" href="mod_bayar/print_kwitansi.php?id=<?= enkripsi($bayar['id_bayar']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit    "></i></a> -->
                                                <button class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit-bayar<?= $no; ?>"><i class="fas fa-edit    "></i></button>
                                                <button data-id="<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash-alt    "></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-edit-bayar<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Pembayaran</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="form-edit-bayar<?= $no; ?>">
                                                                <div class="modal-body">
                                                                    <input type="hidden" value="<?= $bayar['id_bayar'] ?>" name="id_bayar">
                                                                    <input type="hidden" value="<?= $bayar['id_daftar'] ?>" name="id_daftar">
                                                                    <div class="form-group">
                                                                        <label>Keterangan</label>
                                                                        <input type="text" name="keterangan" value="<?= $bayar['keterangan'] ?>" class="form-control" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Kode Referensi</label>
                                                                        <select class="form-control select2" style="width: 100%" name="id_masuk" required>
                                                                            <option value="">Pilih Kode Referensi</option>
                                                                            <?php
                                                                            $masukq = mysqli_query($koneksi, "select * from keu_pemasukan");
                                                                            while ($masuk = mysqli_fetch_array($masukq)) {
                                                                            ?>
                                                                                <option value="<?= $masuk['id_masuk'] ?>"><?= $masuk['id_masuk'] ?> <?= $masuk['nama_masuk'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pembayaran</label>
                                                                        <select class="form-control select2" style="width: 100%" name="id_biaya" required>
                                                                            <?php
                                                                            $biayaq = mysqli_query($koneksi, "select * from biaya where id_kelas='$bayar[kelas]'");
                                                                            while ($biaya = mysqli_fetch_array($biayaq)) {
                                                                            ?>
                                                                                <option value="">Jenis Pembayaran</option>
                                                                                <option value="<?= $biaya['id_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                                                                <option value="L">Tunggakan</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jumlah">Jumlah Pembayaran Rp.</label>
                                                                        <input value="<?= $bayar['jumlah'] ?>" type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Bulan</label>
                                                                        <select class="form-control select2" style="width: 100%" name="id_bulan" required>
                                                                            <option value="">Pilih Bulan</option>
                                                                            <?php
                                                                            $bulanq = mysqli_query($koneksi, "select * from bulan");
                                                                            while ($bulan = mysqli_fetch_array($bulanq)) {
                                                                            ?>
                                                                                <option value="<?= $bulan['id_bulan'] ?>"><?= $bulan['nama_bulan'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tgl">Tanggal Pembayaran</label>
                                                                        <input type="text" class="form-control datepicker" value="<?= $bayar['tgl_bayar'] ?>" name="tgl" id="tgl" placeholder="">
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
                                            $('#form-edit-bayar<?= $no ?>').submit(function(e) {
                                                e.preventDefault();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'mod_bayar/crud_bayar.php?pg=editbayar',
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
                                                        $('#modal-edit-bayar<?= $no ?>').modal('hide');
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
    <?php } ?>

<?php } else { ?>
    <?php $siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]) ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'><?= $siswa['nama'] ?></h5>
                    <div class="card-header-action">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="fas fa-plus-circle    "></i> Tambah Bayar
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    <!-- Modal -->
                    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-bayar">
                                    <div class="modal-body">
                                        <input type="hidden" value="<?= $siswa['id_daftar'] ?>" name="id">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Referensi</label>
                                            <select class="form-control select2" style="width: 100%" name="id_masuk" required>
                                                <option value="">Pilih Kode Referensi</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from keu_pemasukan where status='1'");
                                                while ($masuk = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $masuk['id_masuk'] ?>"><?= $masuk['id_masuk'] ?> <?= $masuk['nama_masuk'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <select class="form-control select2" style="width: 100%" name="id_biaya" required>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from biaya where id_kelas='$siswa[kelas]'");
                                                while ($biaya = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="">Pembayaran</option>
                                                    <option value="<?= $biaya['id_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pembayaran Rp.</label>
                                            <input value="<?= $biaya['jumlah'] ?>" type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select class="form-control select2" style="width: 100%" name="id_bulan" required>
                                                <option value="">Pilih Bulan</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from bulan");
                                                while ($bulan = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $bulan['id_bulan'] ?>"><?= $bulan['nama_bulan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl">Tanggal Pembayaran</label>
                                            <input type="text" class="form-control datepicker" name="tgl" id="tgl" placeholder="">
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
                                    <th>Kode Transaksi</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tgl Bayar</th>
                                    <th>Petugas</th>
                                    <th>verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from bayar a join daftar b ON a.id_daftar=b.id_daftar where a.id_daftar='$siswa[id_daftar]'");
                                $no = 0;
                                while ($bayar = mysqli_fetch_array($query)) {
                                    $user = fetch($koneksi, 'user', ['id_user' => $bayar['id_user']]);
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $bayar['id_bayar'] ?></td>
                                        <td><?= $bayar['nama'] ?></td>
                                        <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= $bayar['tgl_bayar'] ?></td>
                                        <td><?php if ($user) {
                                                echo $user['nama_user'];
                                            } else {
                                                echo "Online";
                                            } ?></td>
                                        <td>
                                            <?php if ($bayar['verifikasi'] == 1) { ?>
                                                <span class="badge badge-success">Sudah Dicek</span>
                                            <?php } else { ?>
                                                <span class="badge badge-warning">Belum Dicek</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a target="_blank" href="mod_bayar/print_kwitansi.php?id=<?= enkripsi($bayar['id_bayar']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-print    "></i></a>
                                            <button data-id="<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash    "></i></button>
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
        var cleaveI = new Cleave('.uang', {
            numeral: true
        });
    </script>
<?php } ?>
<script>
    $('#form-bayar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_bayar/crud_bayar.php?pg=tambah',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                if (data == 'OK') {
                    $('#tambahdata').modal('hide');
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'data gagal disimpan',
                        position: 'topRight'
                    });
                }
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
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
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
                    url: 'mod_bayar/crud_bayar.php?pg=verifikasi',
                    method: "POST",
                    data: 'id_bayar=' + id,
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
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
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
                    url: 'mod_bayar/crud_bayar.php?pg=batalverifikasi',
                    method: "POST",
                    data: 'id_bayar=' + id,
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
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
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