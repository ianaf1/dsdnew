<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="presensi_kelas">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="id" required>
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
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class='m-0 font-weight-bold text-primary'>Data Presensi <?= hari_ini() ?></h5>
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
                            $query = mysqli_query($koneksi, "select DISTINCT id_kelas, nama_rombel, id_jenjang from rombel order by nama_rombel asc");
                            $no = 0;
                            while ($rombel = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $rombel['nama_rombel'] ?></td>
                                    <td>Wali Kelas</td>
                                    <td><?= $rombel['id_jenjang'] ?></td>
                                    <td><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where id_kelas = '$rombel[id_kelas]'")) ?></td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail kelas" href="?pg=presensi_kelas&id=<?= enkripsi($rombel['id_kelas']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
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