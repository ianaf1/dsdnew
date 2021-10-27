<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="presensi_kelas">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <input type="date" name="tgl" class="form-control datepicker" value="">
                </div>
            </div>
            <div class="col-md-6">
                &nbsp;<button type="submit" class="btn btn-primary btn-xs-5 p-l-10"><i class="fas fa-search    "></i> Cari</button>
            </div>
        </div>
    </form>
</div>
<?php if (isset($_GET['tgl'])) { ?>
    <?php
    $tgl = fetch($koneksi, 'presensi', ['tgl' => $_GET['tgl']]); { ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Presensi Kelas <?= $kelas['nama_kelas'] ?> Hari <?= $tgl['hari'] ?></h5>
                        <div class="card-header-action">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="table-2" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Ket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sekarang = date('Ymd');
                                    $query = mysqli_query($koneksi, "select * from presensi a join kelas b ON a.id_kelas=b.id_kelas where a.tgl='$_GET[tgl]'");
                                    $no = 0;
                                    while ($presensi = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $presensi['nama'] ?></td>
                                            <td><?= $presensi['nama_kelas'] ?></td>
                                            <td><?= $presensi['tgl'] ?></td>
                                            <td><?= $presensi['jam_msk'] ?></td>
                                            <td><?= $presensi['jam_plg'] ?></td>
                                            <td><?= $presensi['ket'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                    Edit
                                                </button>
                                                <button data-id="<?= $presensi['id_presensi'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-edit<?= $no ?>" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form id="form-edit<?= $no ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Jam</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" value="<?= $presensi['id_presensi'] ?>" name="id_presensi" class="form-control" required="">
                                                                    <div class="form-group">
                                                                        <label>Jam Masuk</label>
                                                                        <input type="text" value="<?= $presensi['jam_msk'] ?>" name="jam_msk" class="form-control" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jam Keluar</label>
                                                                        <input type="text" value="<?= $presensi['jam_plg'] ?>" name="jam_keluar" class="form-control" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Keterangan</label>
                                                                        <select class="form-control select2" name="ket" required>
                                                                            <option value="">Pilih Keterangan</option>
                                                                            <option value="Hadir">Hadir</option>
                                                                            <option value="Bolos">Bolos</option>
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
                                            </td>
                                            <script>
                                                $('#form-edit<?= $no ?>').submit(function(e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'mod_presensi/crud_presensi.php?pg=ubah',
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
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'>Presensi Siswa Hari <?= hari_ini() ?></h5>
                    <div class="card-header-action">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="table-2" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <!-- <th>Tanggal</th> -->
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Ket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sekarang = date('Ymd');
                                $query = mysqli_query($koneksi, "select * from presensi a join kelas b ON a.id_kelas=b.id_kelas where a.tgl='$sekarang'");
                                $no = 0;
                                while ($presensi = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $presensi['nama'] ?></td>
                                        <td><?= $presensi['nama_kelas'] ?></td>
                                        <!-- <td><?= $presensi['tgl'] ?></td> -->
                                        <td><?= $presensi['jam_msk'] ?></td>
                                        <td><?= $presensi['jam_plg'] ?></td>
                                        <td><?= $presensi['ket'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                Edit
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-edit<?= $no ?>" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form id="form-edit<?= $no ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Jam</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $presensi['id_presensi'] ?>" name="id_presensi" class="form-control" required="">
                                                                <div class="form-group">
                                                                    <label>Jam Masuk</label>
                                                                    <input type="text" value="<?= $presensi['jam_msk'] ?>" name="jam_msk" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jam Keluar</label>
                                                                    <input type="text" value="<?= $presensi['jam_plg'] ?>" name="jam_keluar" class="form-control" required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Keterangan</label>
                                                                    <select class="form-control select2" name="ket" required>
                                                                        <option value="">Pilih Keterangan</option>
                                                                        <option value="Hadir">Hadir</option>
                                                                        <option value="Bolos">Bolos</option>
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
                                        </td>
                                        <script>
                                            $('#form-edit<?= $no ?>').submit(function(e) {
                                                e.preventDefault();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'mod_presensi/crud_presensi.php?pg=ubah',
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