<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="bayar">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="id" required>
                        <option value="">Cari Siswa</option>
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
                    <!-- Modal -->
                    <div class="modal fade" id="tambahtunggakan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Tunggakan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-tambahtunggakan">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Siswa</label>
                                            <select class="form-control select2" style="width: 100%" name="id_daftar" required>
                                                <option value="">Pilih Siswa</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from daftar where status='1'");
                                                while ($siswa = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $siswa['id_daftar'] ?>"><?= $siswa['nama'] ?>, <?= $siswa['kelas'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control uang" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control select2" style="width: 100%" name="id_semester" required>
                                                <option value="">Pilih Semester</option>
                                                <option value="1">Ganjil</option>
                                                <option value="2">Genap</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="thn_ajaran">Tahun Ajaran</label>
                                            <input type="text" class="form-control uang" name="thn_ajaran" id="thn_ajaran" placeholder="Contoh 2020/2021" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Tunggakan Rp.</label>
                                            <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" placeholder="">
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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Tunggakan Siswa</h5>
                        <div class="card-header-action">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahtunggakan">
                                <i class="fas fa-plus-circle    "></i> Tambah Tunggakan
                            </button>
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
                                        <th class="text-center">Nama Siswa</th>
                                        <th class="text-center">Jumlah Tunggakan</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select id_daftar, nama, kelas from daftar where status='1'");

                                    while ($daftar = mysqli_fetch_array($query)) {
                                        $q2 = mysqli_query($koneksi, "select sum(jumlah) as total from biaya where id_kelas='$daftar[kelas]' AND id_semester != '$semester_aktif[id_semester]' OR thn_ajaran!='$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                        $biayasiswa = mysqli_fetch_array($q2);
                                        $q3 = mysqli_query($koneksi, "select sum(jumlah) as total from siswa_tunggakan where id_daftar='$daftar[id_daftar]'");
                                        $tunggakansiswa = mysqli_fetch_array($q3);
                                        $q4 = mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' AND id_biaya='L' OR id_daftar='$daftar[id_daftar]' AND id_biaya='$biayasiswa[id_biaya]'");
                                        $siswabayar = mysqli_fetch_array($q4);
                                        $totaltunggakan = $biayasiswa['total'] + $tunggakansiswa['total'] - $siswabayar['total'];
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td><?= $daftar['nama'] ?></td>
                                            <td class="text-center"><?= "Rp " . number_format($totaltunggakan, 0, ",", ".") ?></td>
                                            <td class="text-center">
                                                <?php if ($totaltunggakan <= 0) { ?>
                                                    <span class="badge badge-success">LUNAS</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">BELUM LUNAS</span>
                                                <?php } ?>
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
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Data Pembayaran Siswa</h5>
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
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($koneksi, "select * from bayar a join daftar b ON a.id_daftar=b.id_daftar where a.verifikasi='1' AND a.id_semester != '$semester_aktif[id_semester]' AND thn_ajaran !='$tahun_ajaran_aktif[nama_thn_ajaran]'");
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
                                            <td><?= $bayar['keterangan'] ?></td>
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
                                                                    <input type="hidden" value="<?= $semester_aktif['id_semester'] ?>" name="semester">
                                                                    <input type="hidden" value="<?= $tahun_ajaran_aktif['nama_thn_ajaran'] ?>" name="thn_ajaran">
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
                                                                            <option value="">Jenis Pembayaran</option>
                                                                            <?php
                                                                            $biayaq = mysqli_query($koneksi, "select * from biaya where id_kelas='$bayar[kelas]' AND id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                                                            while ($biaya = mysqli_fetch_array($biayaq)) {
                                                                            ?>
                                                                                <option value="<?= $biaya['id_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                                                            <?php } ?>
                                                                            <option value="L">Tunggakan</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" value="<?= $bayar['id_bayar'] ?>" name="id_bayar">
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
                                                                        <input type="date" class="form-control datepicker" value="<?= $bayar['tgl_bayar'] ?>" name="tgl" id="tgl" placeholder="">
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
                                        <input type="hidden" value="<?= $semester_aktif['id_semester'] ?>" name="id_semester">
                                        <input type="hidden" value="<?= $tahun_ajaran_aktif['nama_thn_ajaran'] ?>" name="thn_ajaran">
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
                                                <option value="">Jenis Pembayaran</option>
                                                <?php
                                                $query = mysqli_query($koneksi, "select * from biaya where id_kelas='$siswa[kelas]' AND id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                                while ($biaya = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?= $biaya['id_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                                <?php } ?>
                                                <option value="L">Tunggakan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pembayaran Rp.</label>
                                            <input value="<?= $biaya['jumlah'] ?>" type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" placeholder="" required>
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
                                            <input type="text" class="form-control datepicker" name="tgl" id="tgl" placeholder="" required>
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
                                    <th>Kode Biaya</th>
                                    <th>Nama Biaya</th>
                                    <th>Jumlah Biaya</th>
                                    <th>Terbayar</th>
                                    <th>Tagihan</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <?php
                                $totalq = mysqli_query($koneksi, "select sum(jumlah) as total, id_biaya from biaya where id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]' AND id_kelas='$siswa[kelas]'");
                                while ($total = mysqli_fetch_array($totalq)) {
                                    $qb = mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$siswa[id_daftar]' AND id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                    $sbayar = mysqli_fetch_array($qb);
                                    $sisabayar = $total['total'] - $sbayar['total'];
                                ?>
                                    <tr>
                                        <td class="text-center" colspan="3"><b>TOTAL</b></td>
                                        <td><b><?= "Rp. " . number_format($total['total'], 0, ",", ".") ?></b></td>
                                        <td><b><?= "Rp. " . number_format($sbayar['total'], 0, ",", ".") ?></b></td>
                                        <td><b><?= "Rp. " . number_format($sisabayar, 0, ",", ".") ?></b></td>
                                        <td class="text-center">
                                            <?php if ($sisabayar <= 0) { ?>
                                                <span class="badge badge-success">LUNAS</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">BELUM LUNAS</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><b>Action</b></td>
                                    </tr>
                                <?php }
                                ?>
                            </tfoot>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from biaya where id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]' AND id_kelas='$siswa[kelas]'");
                                $no = 0;
                                while ($biaya = mysqli_fetch_array($query)) {
                                    $qb = mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$siswa[id_daftar]' AND id_biaya='$biaya[id_biaya]'");
                                    $sbayar = mysqli_fetch_array($qb);
                                    $sisabayar = $biaya['jumlah'] - $sbayar['total'];
                                    $user = fetch($koneksi, 'user', ['id_user' => $biaya['id_user']]);
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $biaya['kode_biaya'] ?></td>
                                        <td><?= $biaya['nama_biaya'] ?></td>
                                        <td><?= "Rp " . number_format($biaya['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= "Rp " . number_format($sbayar['total'], 0, ",", ".") ?></td>
                                        <td><?= "Rp " . number_format($sisabayar, 0, ",", ".") ?></td>
                                        <td class="text-center">
                                            <?php if ($sisabayar <= 0) { ?>
                                                <span class="badge badge-success">LUNAS</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">BELUM LUNAS</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahdata<?= $no ?>"><i class="fas fa-check-circle    "></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="tambahdata<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form id="form-bayar<?= $no ?>">
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $siswa['id_daftar'] ?>" name="id">
                                                                <input type="hidden" value="<?= $biaya['id_semester'] ?>" name="id_semester">
                                                                <input type="hidden" value="<?= $biaya['thn_ajaran'] ?>" name="thn_ajaran">
                                                                <input type="hidden" value="<?= $biaya['nama_biaya'] ?>" name="keterangan">
                                                                <input type="hidden" value="<?= $biaya['kode_biaya'] ?>" name="id_masuk">
                                                                <input type="hidden" value="<?= $biaya['id_biaya'] ?>" name="id_biaya">
                                                                <input type="hidden" value="<?= $sisabayar ?>" name="jumlah">
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
                                                                    <input type="text" class="form-control datepicker" name="tgl" id="tgl" placeholder="" required>
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
                                            <script>
                                                $('#form-bayar<?= $no ?>').submit(function(e) {
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
                                                                $('#tambahdata<?= $no ?>').modal('hide');
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
                                            </script>
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
    <!-- Tabel Tunggakan -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'>Rincian Tunggakan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="dataTable" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Keterangan</th>
                                    <th>Semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * siswa_tunggakan where id_daftar='$siswa[id_daftar]'");
                                $no = 0;
                                while ($tunggakan = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $tunggakan['keterangan'] ?></td>
                                        <td>
                                            <?php if ($tunggakan['id_semester'] == 1) { ?>
                                                <span class="badge badge-success">Ganjil</span>
                                            <?php } else { ?>
                                                <span class="badge badge-warning">Genap</span>
                                            <?php } ?>
                                        </td>
                                        <td><?= $tunggakan['thn_ajaran'] ?></td>
                                        <td><?= "Rp " . number_format($tunggakan['jumlah'], 0, ",", ".") ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                            <tfoot>
                                <?php
                                $qttl = mysqli_query($koneksi, "select sum(jumlah) as ttl from siswa_tunggakan where id_daftar='$siswa[id_daftar]'");
                                $totaltunggakan = mysqli_fetch_array($qttl);
                                $qbyr = mysqli_query($koneksi, "select sum(jumlah) as ttl from bayar where id_daftar='$siswa[id_daftar]' AND id_biaya='L'");
                                $bayartunggakan = mysqli_fetch_array($qbyr);
                                $sisaTunggakan = $totaltunggakan['ttl'] - $bayartunggakan['ttl']; { ?>
                                    <tr>
                                        <td class="text-center" colspan="4"><b>TOTAL TUNGGAKAN</b></td>
                                        <td><b><?= "Rp. " . number_format($totaltunggakan['ttl'], 0, ",", ".") ?></b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="4"><b>TOTAL Bayar</b></td>
                                        <td><b><?= "Rp. " . number_format($bayartunggakan['ttl'], 0, ",", ".") ?></b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="4"><b>Sisa Tunggakan</b></td>
                                        <td><b><?= "Rp. " . number_format($sisaTunggakan, 0, ",", ".") ?></b></td>
                                    </tr>
                                <?php
                                } ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pembayaran -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class='m-0 font-weight-bold text-primary'>Data Pembayaran <?= $siswa['nama'] ?></h5>
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
                                    <th>Keterangan</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tgl Bayar</th>
                                    <th>Penerima</th>
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
                                        <td><?= $bayar['keterangan'] ?></td>
                                        <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= $bayar['tgl_bayar'] ?></td>
                                        <td><?php if ($user) {
                                                echo $user['nama_user'];
                                            } else {
                                                echo "Online";
                                            } ?>
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
                                                                <input type="hidden" value="<?= $semester_aktif['id_semester'] ?>" name="semester">
                                                                <input type="hidden" value="<?= $tahun_ajaran_aktif['nama_thn_ajaran'] ?>" name="thn_ajaran">
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
                                                                        <option value="">Jenis Pembayaran</option>
                                                                        <?php
                                                                        $biayaq = mysqli_query($koneksi, "select * from biaya where id_kelas='$bayar[kelas]' AND id_semester='$semester_aktif[id_semester]' AND thn_ajaran = '$tahun_ajaran_aktif[nama_thn_ajaran]'");
                                                                        while ($biaya = mysqli_fetch_array($biayaq)) {
                                                                        ?>
                                                                            <option value="<?= $biaya['id_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                                                        <?php } ?>
                                                                        <option value="L">Tunggakan</option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" value="<?= $bayar['id_bayar'] ?>" name="id_bayar">
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
<script>
    $('#form-tambahtunggakan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_bayar/crud_bayar.php?pg=tambahtunggakan',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                if (data == 'OK') {
                    $('#tambahtunggakan').modal('hide');
                    swal({
                        title: 'Mantaap!',
                        text: 'Data Berhasil Ditambahkan Guys...',
                        icon: 'success'
                    }).then(function() {
                        location.reload();
                    });

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