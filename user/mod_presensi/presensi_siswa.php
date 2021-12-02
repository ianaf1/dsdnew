<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Kehadiran <?= $siswa['nama'] ?></h5>
                <div class="card-header-action">
                    <b>Total Kehadiran <?= mysqli_num_rows(mysqli_query($koneksi, "select * from presensi where nis='$siswa[nis]' AND ket=Hadir")) ?></b>
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
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from presensi where nis='$siswa[nis]'");
                            $no = 0;
                            while ($presensi = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $presensi['hari'] ?></td>
                                    <td><?= $presensi['tgl'] ?></td>
                                    <td><?= $presensi['jam_msk'] ?></td>
                                    <td><?= $presensi['jam_plg'] ?></td>
                                    <td><?= $presensi['ket'] ?></td>
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