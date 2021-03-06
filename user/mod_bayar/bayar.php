<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Biaya Semester</h5>
                <div class="card-header-action">
                    <?php $query = mysqli_query($koneksi, "select sum(jumlah) as total from biaya where id_kelas='$siswa[kelas]'");
                    $total = mysqli_fetch_array($query);
                    ?>
                    <b>Total Biaya <?= "Rp. " . number_format($total['total'], 0, ",", ".") ?></b>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsiv">
                    <table style="font-size: 14px" class="table table-striped table-sm" id="dataTable">
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
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Tunggakan</h5>
                <div class="card-header-action">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId">
                        <i class="fas fa-info-circle    "></i> Info Pembayaran
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Info Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= $setting['infobayar'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="table-1" style="font-size: 12px">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Keterangan</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from siswa_tunggakan where id_daftar='$siswa[id_daftar]'");
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
                                    <td>
                                        <?php if ($tunggakan['status'] == 1) { ?>
                                            <span class="badge badge-success">LUNAS</span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning">BELUM LUNAS</span>
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