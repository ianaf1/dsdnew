<?php
require("../../../config/database.php");
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
$kelas = $_GET['id'];
header("Content-type: application/vnd-ms-excel");
if ($kelas = '') {
    header("Content-Disposition: attachment; filename=DATA_SISWA.xls");
} else {
    header("Content-Disposition: attachment; filename=DATA_SISWA_$kelas.xls");
}
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
?>
<style>
    .str {
        mso-number-format: \@;
    }
</style>

<center>
    <h3>DATA SISWA </h3>
</center>
<table border="1">
    <thead>
        <tr>
            <th class="text-left">
                No
            </th>
            <th>Nama Siswa</th>
            <th>Kewarganegaraan</th>
            <th>NISN</th>
            <th>NIS LOKAL</th>
            <th>NIK</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Anak Ke</th>
            <th>Jml Saudara</th>
            <th>Agama</th>
            <th>Cita-cita</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Hobi</th>
            <th>Status Tempat Tinggal</th>
            <th>Provinsi</th>
            <th>Kab/Kota</th>
            <th>Kecamatan</th>
            <th>Desa/Kelurahan</th>
            <th>Nama Jalan/Dusun</th>
            <th>Kordinat</th>
            <th>Kodepos</th>
            <th>Alat Transportasi</th>
            <th>Jarak Rumah</th>
            <th>Waktu Tempuh</th>
            <th>Yang Membiayai Sekolah</th>
            <th>Kebutuhan Khusus</th>
            <th>Kebutuhan Disabilitas</th>
            <th>TK/RA</th>
            <th>PAUD</th>
            <th>Hepatitis</th>
            <th>Polio</th>
            <th>BCG</th>
            <th>Campak</th>
            <th>DPT</th>
            <th>Covid</th>
            <th>No KIP</th>
            <th>No KKS</th>
            <th>No PKH</th>
            <th>No KK</th>
            <th>Nama Kepala Keluarga</th>
            <th>Nama Ayah</th>
            <th>Status Ayah</th>
            <th>Warga Ayah</th>
            <th>NIK Ayah</th>
            <th>Tempat Lahir Ayah</th>
            <th>Tanggal Lahir Ayah</th>
            <th>Pendidikan Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Penghasilan Ayah</th>
            <th>No HP Ayah</th>
            <th>Domisili Ayah</th>
            <th>Status Tempat Tinggal Ayah</th>
            <th>Provinsi Ayah</th>
            <th>Kab/Kota Ayah</th>
            <th>Kecamatan Ayah</th>
            <th>Desa/Keluarahan Ayah</th>
            <th>Alamat Ayah</th>
            <th>Kodepos Ayah</th>
            <th>Nama Ibu</th>
            <th>Status Ibu</th>
            <th>Warga Ibu</th>
            <th>NIK Ibu</th>
            <th>Tempat Lahir Ibu</th>
            <th>Tanggal Lahir Ibu</th>
            <th>Pendidikan Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Penghasilan Ibu</th>
            <th>No HP Ibu</th>
            <th>Domisili Ibu</th>
            <th>Status Tempat Tinggal Ibu</th>
            <th>Provinsi Ibu</th>
            <th>Kab/Kota Ibu</th>
            <th>Kecamatan Ibu</th>
            <th>Desa/Keluarahan Ibu</th>
            <th>Alamat Ibu</th>
            <th>Kodepos Ibu</th>
            <th>Status Wali</th>
            <th>Nama Wali</th>
            <th>Warga Wali</th>
            <th>NIK Wali</th>
            <th>Tempat Lahir Wali</th>
            <th>Tanggal Lahir Wali</th>
            <th>Pendidikan Wali</th>
            <th>Pekerjaan Wali</th>
            <th>Penghasilan Wali</th>
            <th>No HP Wali</th>
            <th>Domisili Wali</th>
            <th>Provinsi Wali</th>
            <th>Kab/Kota Wali</th>
            <th>Kecamatan Wali</th>
            <th>Desa/Keluarahan Wali</th>
            <th>Alamat Wali</th>
            <th>Kodepos Wali</th>



        </tr>
    </thead>
    <tbody>
        <?php
        if ($kelas = '') {
            $query = mysqli_query($koneksi, "select * from daftar where status = '1' order by kelas asc");
        } else {
            $kelas = $_GET['id'];
            $query = mysqli_query($koneksi, "select * from daftar a join kelas b ON a.id_kelas=b.id_kelas where a.kelas='$kelas' && a.status='1' order by b.nama_kelas asc");
        }
        $no = 0;
        while ($siswa = mysqli_fetch_array($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $siswa['nama'] ?></td>
                <td><?= $siswa['warga_siswa'] ?></td>
                <td class="str"><?= $siswa['nisn'] ?></td>
                <td class="str"><?= $siswa['nis'] ?></td>
                <td class="str"><?= $siswa['nik'] ?></td>
                <td><?= $siswa['tempat_lahir'] ?></td>
                <td class="str"><?= $siswa['tgl_lahir'] ?></td>
                <td><?= $siswa['jenkel'] ?></td>
                <td><?= $siswa['kelas'] ?></td>
                <td><?= $siswa['anak_ke'] ?></td>
                <td><?= $siswa['saudara'] ?></td>
                <td><?= $siswa['agama'] ?></td>
                <td><?= $siswa['cita'] ?></td>
                <td class="str"><?= $siswa['no_hp'] ?></td>
                <td class="str"><?= $siswa['email'] ?></td>
                <td><?= $siswa['hobi'] ?></td>
                <td><?= $siswa['tinggal'] ?></td>
                <td><?= $siswa['provinsi'] ?></td>
                <td><?= $siswa['kota'] ?></td>
                <td><?= $siswa['kecamatan'] ?></td>
                <td><?= $siswa['desa'] ?></td>
                <td><?= $siswa['alamat'] ?></td>
                <td><?= $siswa['kordinat'] ?></td>
                <td><?= $siswa['kode_pos'] ?></td>
                <td><?= $siswa['transportasi'] ?></td>
                <td><?= $siswa['jarak'] ?></td>
                <td><?= $siswa['waktu'] ?></td>
                <td><?= $siswa['biaya_sekolah'] ?></td>
                <td><?= $siswa['keb_khusus'] ?></td>
                <td><?= $siswa['keb_disabilitas'] ?></td>
                <td><?= $siswa['tk'] ?></td>
                <td><?= $siswa['paud'] ?></td>
                <td><?= $siswa['hepatitis_b'] ?></td>
                <td><?= $siswa['polio'] ?></td>
                <td><?= $siswa['bcg'] ?></td>
                <td><?= $siswa['campak'] ?></td>
                <td><?= $siswa['dpt'] ?></td>
                <td><?= $siswa['covid'] ?></td>
                <td><?= $siswa['no_kip'] ?></td>
                <td><?= $siswa['no_kks'] ?></td>
                <td><?= $siswa['no_pkh'] ?></td>
                <td class="str"><?= $siswa['no_kk'] ?></td>
                <td><?= $siswa['kepala_keluarga'] ?></td>
                <td><?= $siswa['nama_ayah'] ?></td>
                <td><?= $siswa['status_ayah'] ?></td>
                <td><?= $siswa['warga_ayah'] ?></td>
                <td class="str"><?= $siswa['nik_ayah'] ?></td>
                <td><?= $siswa['tempat_ayah'] ?></td>
                <td class="str"><?= $siswa['tgl_lahir_ayah'] ?></td>
                <td><?= $siswa['pendidikan_ayah'] ?></td>
                <td><?= $siswa['pekerjaan_ayah'] ?></td>
                <td><?= $siswa['penghasilan_ayah'] ?></td>
                <td class="str"><?= $siswa['no_hp_ayah'] ?></td>
                <td><?= $siswa['domisili_ayah'] ?></td>
                <td><?= $siswa['status_tmp_tinggal_ayah'] ?></td>
                <td><?= $siswa['prov_ayah'] ?></td>
                <td><?= $siswa['kab_ayah'] ?></td>
                <td><?= $siswa['kec_ayah'] ?></td>
                <td><?= $siswa['desa_ayah'] ?></td>
                <td><?= $siswa['alamat_ayah'] ?></td>
                <td><?= $siswa['kodepos_ayah'] ?></td>
                <td><?= $siswa['nama_ibu'] ?></td>
                <td><?= $siswa['status_ibu'] ?></td>
                <td><?= $siswa['warga_ibu'] ?></td>
                <td class="str"><?= $siswa['nik_ibu'] ?></td>
                <td><?= $siswa['tempat_ibu'] ?></td>
                <td class="str"><?= $siswa['tgl_lahir_ibu'] ?></td>
                <td><?= $siswa['pendidikan_ibu'] ?></td>
                <td><?= $siswa['pekerjaan_ibu'] ?></td>
                <td><?= $siswa['penghasilan_ibu'] ?></td>
                <td class="str"><?= $siswa['no_hp_ibu'] ?></td>
                <td><?= $siswa['domisili_ibu'] ?></td>
                <td><?= $siswa['status_tmp_tinggal_ibu'] ?></td>
                <td><?= $siswa['prov_ibu'] ?></td>
                <td><?= $siswa['kab_ibu'] ?></td>
                <td><?= $siswa['kec_ibu'] ?></td>
                <td><?= $siswa['desa_ibu'] ?></td>
                <td><?= $siswa['alamat_ibu'] ?></td>
                <td><?= $siswa['kodepos_ibu'] ?></td>
                <td><?= $siswa['status_wali'] ?></td>
                <td><?= $siswa['nama_wali'] ?></td>
                <td><?= $siswa['warga_wali'] ?></td>
                <td class="str"><?= $siswa['nik_wali'] ?></td>
                <td><?= $siswa['tempat_wali'] ?></td>
                <td class="str"><?= $siswa['tgl_lahir_wali'] ?></td>
                <td><?= $siswa['pendidikan_wali'] ?></td>
                <td><?= $siswa['pekerjaan_wali'] ?></td>
                <td><?= $siswa['penghasilan_wali'] ?></td>
                <td class="str"><?= $siswa['no_hp_wali'] ?></td>
                <td><?= $siswa['domisili_wali'] ?></td>
                <td><?= $siswa['prov_wali'] ?></td>
                <td><?= $siswa['kab_wali'] ?></td>
                <td><?= $siswa['kec_wali'] ?></td>
                <td><?= $siswa['desa_wali'] ?></td>
                <td><?= $siswa['alamat_wali'] ?></td>
                <td><?= $siswa['kodepos_wali'] ?></td>


            </tr>

        <?php }
        ?>


    </tbody>
</table>