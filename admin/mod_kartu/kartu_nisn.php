<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Cetak Kartu NISN</h4>
            </div>
        </div>
        <div class="card-header-action">
            <form action="mod_kartu/cetak_nisn.php" target="_Blank" method="post" class="form-horizontal" role="form">
                <button type="submit" class="pull-right btn btn-flat bg-purple"><i class="fa fa-print"></i> CETAK KARTU NISN</button>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="font-size: 12px" class="table table-bordered table-md" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Pilih</th>
                                    <th>Foto</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>L/P</th>
                                    <th>TTL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from siswa WHERE status='1'");
                                $no = 0;
                                while ($siswa = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td style="width:10px"><?= $no; ?></td>
                                        <td style="width:10px">
                                            <input name='selector[]' type='checkbox' name='tandai' class='minimal flat' value="<?= $siswa['id_siswa'] ?>">
                                        </td>
                                        <td style="width:90px">
                                            <p><img alt="image" src="../<?= $siswa['file_foto'] ?>" class="img-fluid" width=40 height=20></p>
                                        </td>
                                        <td style="width:90px"><?= $siswa['nisn'] ?></td>
                                        <td><?= $siswa['nama_siswa'] ?></td>
                                        <td style="width:20px"><?= $siswa['jk'] ?></td>
                                        <td><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>