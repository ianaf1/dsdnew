<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
$id_kelas = dekripsi($_GET['id']);
$kelas = fetch($koneksi, 'kelas', ['id_kelas' => $id_kelas]);
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa Kelas $kelas[nama_kelas].xls");
?>

<table style="font-size: 12px" class="table table-bordered table-sm" id="table-1">
    <center>
        <h4>DATA SISWA KELAS</h4>
    </center>
    <thead>
        <tr>
            <th class="text-center">
                No
            </th>
            <th class="text-center">NIS</th>
            <th class="text-center">Nama Siswa</th>
            <th class="text-center">L/P</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "select * from daftar a join kelas b ON a.id_kelas=b.id_kelas where a.id_kelas='$kelas[id_kelas]' order by a.nama asc");
        $no = 0;
        while ($daftar = mysqli_fetch_array($query)) {
            $no++;
        ?>
            <tr>
                <td class="text-center"><?= $no; ?></td>
                <td class="str"><?= $daftar['nis'] ?></td>
                <td><?= $daftar['nama'] ?></td>
                <td class="text-center"><?= $daftar['jenkel'] ?></td>
            </tr>

        <?php }
        ?>
    </tbody>
</table>