<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <form style="width: 80%">
        <input type="hidden" name="pg" value="presensi">
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
    <form style="width: 80%">
        <input type="hidden" name="pg" value="presensi'&'id'='<?= enkripsi($kelas['id_kelas']) ?>">
        <div class="form-row">
            <div class="col-md-6 col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" style="width: 100%" name="hari" required>
                        <option value="">Pilih Hari</option>
                        <?php
                        $query = mysqli_query($koneksi, "select * from hari");
                        while ($hari = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?= enkripsi($hari['id_hari']) ?>"><?= $kelas['nama_hari'] ?></option>
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
    <?php if ($user['level'] == 'admin' or $user['level'] == 'bendahara' or $user['level'] == 'kepala' or $user['level'] == 'operator') { ?>
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
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail kelas" href="?pg=presensi&id=<?= enkripsi($rombel['id_kelas']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
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
    <?php $kelas = fetch($koneksi, 'kelas', ['id_kelas' => dekripsi($_GET['id'])]) ?>
    <?php if (isset($_GET['hari']) == '') { ?>
        <?php $hari_ini = hari_ini() ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Presensi Kelas <?= $kelas['nama_kelas'] ?> Hari <?= hari_ini() ?></h5>
                        <div class="card-header-action">
                            <a target="_blank" href="mod_rombel/export_kelas.php?id=<?= enkripsi($kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-download"></i></i></a>
                            <!-- Button trigger modal -->
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
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Ket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from presensi a  left join daftar b ON a.nis = b.nis left join kelas c ON b.id_kelas=c.id_kelas where a.id_kelas='$kelas[id_kelas]' AND a.hari='$hari_ini' order by b.nama asc");
                                    $no = 0;
                                    while ($presensi = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $presensi['nis'] ?></td>
                                            <td><?= $presensi['nama'] ?></td>
                                            <td><?= $presensi['tgl'] ?></td>
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
    <?php } else { ?>
        <?php $hari_ini = fetch($koneksi, 'hari', ['id_hari' => dekripsi($_GET['hari'])]); ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class='m-0 font-weight-bold text-primary'>Presensi Kelas <?= $kelas['nama_kelas'] ?> Hari <?= $hari_ini['nama_hari'] ?></h5>
                        <div class="card-header-action">
                            <a target="_blank" href="mod_rombel/export_kelas.php?id=<?= enkripsi($kelas['id_kelas']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-download"></i></i></a>
                            <!-- Button trigger modal -->
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
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Ket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from presensi a  left join daftar b ON a.nis = b.nis left join kelas c ON b.id_kelas=c.id_kelas where a.id_kelas='$kelas[id_kelas]' AND a.hari='$hari_ini' order by b.nama asc");
                                    $no = 0;
                                    while ($presensi = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $presensi['nis'] ?></td>
                                            <td><?= $presensi['nama'] ?></td>
                                            <td><?= $presensi['tgl'] ?></td>
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
    <?php } ?>
<?php } ?>