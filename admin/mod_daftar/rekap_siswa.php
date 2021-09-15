<?php
$sql = mysqli_query($koneksi, "select max(nis) as maxID from daftar");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$nourut = (int) substr($kode, 14, 4);
$nourut++;
$ket = "131236010019";
$th = "21";
$nisbaru = $ket . $th . sprintf("%04s", $nourut);

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 font-weight-bold text-gray-800">Rekap Siswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Siswa Aktif</h5>
            <div class="card-header-action">
                <!-- <a class="btn btn-primary btn-sm" href="mod_daftar/export/export_excel.php" role="button"><i class="fas fa-download"></i> Download Excel</a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="font-size: 14px" class="table table-bordered table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">Kelas</th>
                            <th colspan="3" class="text-center">Jumlah Siswa</th>
                        </tr>
                        <tr>
                            <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JML</th>
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
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?= $rombel['nama_rombel'] ?></td>
                                <td class="text-center"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where status=1 && jenkel='L' AND id_kelas = '$rombel[id_kelas]'")) ?></td>
                                <td class="text-center"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where status=1 && jenkel='P' AND id_kelas = '$rombel[id_kelas]'")) ?></td>
                                <td class="text-center"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from rombel where nama_rombel = '$rombel[nama_rombel]'")) ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>