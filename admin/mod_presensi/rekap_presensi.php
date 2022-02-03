<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php if (isset($_GET['id']) == '') { ?>
    <?php if ($user['level'] == 'admin' or $user['level'] == 'bendahara' or $user['level'] == 'kepala' or $user['level'] == 'operator') { ?>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Presensi Rombel</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="dataTable" style="font-size: 12px">
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
                                    $query = mysqli_query($koneksi, "select * from kelas order by nama_kelas asc");
                                    $no = 0;
                                    while ($rombel = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $rombel['nama_kelas'] ?></td>
                                            <td>Wali Kelas</td>
                                            <td><?= $rombel['id_jenjang'] ?></td>
                                            <td><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where id_kelas = '$rombel[id_kelas]'")) ?></td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail kelas" href="?pg=rekap_presensi&id=<?= enkripsi($rombel['id_kelas']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
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
    <?php
    $kelas = fetch($koneksi, 'kelas', ['id_kelas' => dekripsi($_GET['id'])]);
    if (isset($_GET['bulan'])) {
        $bulan = ($_GET['bulan']);
    } else {
        $bulan = date('m');
    };
    ?>
    <form style="width: 100%">
        <input type="hidden" name="pg" value="rekap_presensi">
        <input type="hidden" name="id" value="<?= enkripsi($kelas['id_kelas']) ?>">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="bulan" required>
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                &nbsp;<button type="submit" class="btn btn-primary btn-xs-5 p-l-9"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'>Kelas <?= $kelas['nama_kelas'] ?></h5>
                    <div class="card-header-action">
                        <a target="_blank" href="mod_presensi/export_presensi.php?id=<?= enkripsi($kelas['id_kelas']) ?>&bulan=<?= $bulan ?>" class="btn btn-danger btn-sm"><i class="fas fa-download"></i></i></a>
                        <!-- Button trigger modal -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="dataTable" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Kehadiran</th>
                                    <th>Jumlah Bolos</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['bulan'])) {
                                    $bulan = ($_GET['bulan']);
                                } else {
                                    $bulan = date('m');
                                };
                                $query = mysqli_query($koneksi, "select * from daftar a  join kelas b ON a.id_kelas = b.id_kelas where a.id_kelas='$kelas[id_kelas]' order by a.nama asc");
                                $no = 0;
                                while ($rombel = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $rombel['nis'] ?></td>
                                        <td><?= $rombel['nama'] ?></td>
                                        <td><?= mysqli_num_rows(mysqli_query($koneksi, "select * from presensi where nis='$rombel[nis]' AND ket='Hadir' ")) ?> </td>
                                        <td><?= mysqli_num_rows(mysqli_query($koneksi, "select * from presensi where nis='$rombel[nis]' AND ket='Bolos' ")) ?> </td>
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