<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami");
$saldo = mysqli_query($koneksi, "select saldo * from transaksi  order by tgl_bayar asc");
while ($datasaldo = mysqli_fetch_array($saldo)) {
    if ($datasaldo['debit'] == 0) {
        $saldolama = $saldolama + $datasaldo['debit'] - $datasaldo['kredit'];
    } else {
        $saldolama = $saldolama + $datasaldo['debit'];
    }
}
$saldoawal = $saldolama;
?>

<div class="section-header">
    <div class="row">
        <form style="width: 80%">
            <input type="hidden" name="pg" value="transaksi">
            <div class="form-row">
                <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                        <select class="form-control select2" style="width: 100%" name="id" required>
                            <option value="">Pilih Bulan</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from bulan");
                            while ($bulan = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= enkripsi($bulan['id_bulan']) ?>"><?= $bulan['nama_bulan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    &nbsp;<button type="submit" class="btn btn-primary btn-xs-5 p-l-9"><i class="fas fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
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
    <!-- Modal -->
    <div class="modal fade" id="tambahdebit" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambahdebit">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            <label>Debit</label>
                            <input type="text" name="debit" class="form-control" required="">
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
                            <label for="tgl">Tanggal Transaksi</label>
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

    <!-- Modal -->
    <div class="modal fade" id="tambahkredit" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambahkredit">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Kode Referensi</label>
                            <select class="form-control select2" style="width: 100%" name="id_keluar" required>
                                <option value="">Pilih Kode Referensi</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from keu_pengeluaran where status='1'");
                                while ($keluar = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $keluar['id_keluar'] ?>"><?= $keluar['id_keluar'] ?> <?= $keluar['nama_keluar'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kredit</label>
                            <input type="text" name="kredit" class="form-control" required="">
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
                            <label for="tgl">Tanggal Transaksi</label>
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
</div>


<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <?php
                if (isset($_GET['id']) == '') {
                    echo "<h5 class='m-0 font-weight-bold text-primary'>Data Transaksi</h5>";
                } else {
                    $id_bulan = fetch($koneksi, 'bulan', ['id_bulan' => dekripsi($_GET['id'])]);
                    $query = mysqli_query($koneksi, "select * from bulan where id_bulan='$id_bulan[id_bulan]'");
                    $bulan = mysqli_fetch_array($query);
                    $namabulan = $bulan['nama_bulan'];
                    echo "<h5 class='m-0 font-weight-bold text-primary'>Data Transaksi $namabulan</h5>";
                }
                ?>
                <div class="dropdown m-0">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#tambahkredit">Pengeluaran</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#tambahdebit">Pemasukan</a>
                        <?php
                        if (isset($_GET['id']) == '') {
                            $bulan = date('m');
                            echo "<a class='dropdown-item' href='mod_transaksi/export_kas.php?id=$bulan'>Download</a>";
                        } else {
                            echo "<a class='dropdown-item' href='mod_transaksi/export_kas.php?id=$bulan[id_bulan]'>Download</a>";
                        }
                        ?>
                    </div>
                </div>
                <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Menu :</div>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#tambahdebit">Pemasukan</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#tambahkredit">Pengeluaran</a>
                        <?php
                        if (isset($_GET['id']) == '') {
                            $bulan = date('m');
                            echo "<a class='dropdown-item' href='mod_transaksi/export_kas.php?id=$bulan'>Download</a>";
                        } else {
                            echo "<a class='dropdown-item' href='mod_transaksi/export_kas.php?id=$bulan[id_bulan]'>Download</a>";
                        }
                        ?>
                    </div>
                </div> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-bordered table-sm" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tgl Transaksi</th>
                                <!-- <th class="text-center">Bulan</th> -->
                                <!-- <th class="text-center">Kode</th> -->
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Ref</th>
                                <th class="text-center">Debet (Rp)</th>
                                <th class="text-center">Kredit (Rp)</th>
                                <th class="text-center">Saldo (Rp)</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['id']) <> '') {
                                $bulan = fetch($koneksi, 'bulan', ['id_bulan' => dekripsi($_GET['id'])]);
                                $query = mysqli_query($koneksi, "SELECT * FROM transaksi a JOIN bulan b ON a.id_bulan=b.id_bulan WHERE a.id_bulan='$bulan[id_bulan]' ORDER BY a.tgl_bayar ASC");
                            } else {
                                $bulan = date('m');
                                $query = mysqli_query($koneksi, "select * from transaksi where id_bulan = $bulan order by tgl_bayar asc");
                            }
                            $no = 0;
                            $saldo = $saldoawal;
                            while ($transaksi = mysqli_fetch_array($query)) {
                                $debit = $transaksi['debit'];
                                $kredit = $transaksi['kredit'];
                                $no++;
                                if ($transaksi['debit'] == 0) {
                                    $saldo = $saldo + $transaksi['debit'] - $transaksi['kredit'];
                                } else {
                                    $saldo = $saldo + $transaksi['debit'];
                                }
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td class="text-center"><?= $transaksi['tgl_bayar'] ?></td>
                                    <!-- <td class="text-center"><?= $transaksi['id_bulan'] ?></td> -->
                                    <!-- <td class="text-center"><?= $transaksi['kode_transaksi'] ?></td> -->
                                    <td><?= $transaksi['keterangan'] ?></td>
                                    <td class="text-center"><?= $transaksi['ref'] ?></td>
                                    <td><?= "Rp. " . number_format($debit, 0, ",", ".") ?></td>
                                    <td><?= "Rp. " . number_format($kredit, 0, ",", ".") ?></td>
                                    <td><?= "Rp. " . number_format($saldo, 0, ",", ".") ?></td>
                                    <td class="text-center">
                                        <button data-id="<?= $transaksi['id_transaksi'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php
                            if (isset($_GET['id']) <> '') {
                                $bulan = fetch($koneksi, 'bulan', ['id_bulan' => dekripsi($_GET['id'])]);
                                $total = mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi a join bulan b ON a.id_bulan=b.id_bulan where a.id_bulan='$bulan[id_bulan]'");
                            } else {
                                $bulan = date('m');
                                $total = mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan = $bulan");
                            }
                            while ($transaksi = mysqli_fetch_array($total)) {
                                $totaldebit = $transaksi['totaldebit'];
                                $totalkredit = $transaksi['totalkredit'];
                                $totalsaldo = $totaldebit - $totalkredit
                            ?>
                                <tr>
                                    <td class="text-center" colspan="4"><b>TOTAL</b></td>
                                    <td><b><?= "Rp. " . number_format($totaldebit, 0, ",", ".") ?></b></td>
                                    <td><b><?= "Rp. " . number_format($totalkredit, 0, ",", ".") ?></b></td>
                                    <td><b><?= "Rp. " . number_format($totalsaldo, 0, ",", ".") ?></b></td>
                                    <td class="text-center"><b>Action</b></td>
                                </tr>
                            <?php }
                            ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-tambahdebit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_transaksi/crud_transaksi.php?pg=tambahdebit',
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

    $('#form-tambahkredit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_transaksi/crud_transaksi.php?pg=tambahkredit',
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

    $('#form-laporanbulanan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_transaksi/crud_transaksi.php?pg=laporanbulanan',
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
                    url: 'mod_transaksi/crud_transaksi.php?pg=hapus',
                    method: "POST",
                    data: 'id_transaksi=' + id,
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

<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        setDatePicker() // Panggil fungsi setDatePicker
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            } else { // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })

    function setDatePicker() {
        $(".datepicker").datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true
        }).attr("readonly", "readonly").css({
            "cursor": "pointer",
            "background": "white"
        });
    }
</script>