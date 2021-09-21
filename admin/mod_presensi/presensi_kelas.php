<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="presensi_kelas">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="hari" required>
                        <option value="">Pilih Hari</option>
                        <?php
                        $query = mysqli_query($koneksi, "select * from hari");
                        while ($hari = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= enkripsi($hari['id_hari']) ?>"><?= $hari['nama_hari'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <?php
                        $query = mysqli_query($koneksi, "select * from kelas where status='1' order by nama_kelas asc");
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
                            $query = mysqli_query($koneksi, "select * from presensi a join kelas b where a.id_kelas=b.id_kelas where a.tgl='$sekarang'");
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
                                    <!-- <td>
                                            <button data-id="<?= $rombel['id_daftar'] ?>" class="edit btn btn-danger btn-sm"><i class="fas fa-trash    "></i></button>
                                        </td> -->
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