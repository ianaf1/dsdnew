<?php
session_start();
include '../../config/database.php';
include '../../phpqrcode/qrlib.php';
?>

<!DOCTYPE html>
<html>
<!-- Bagian halaman HTML yang akan konvert -->

<head>
    <meta charset='UTF-8'>
    <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM setting LIMIT 1"));
            echo "$i[nama_sekolah] "; ?></title>
    <link rel="shortcut icon" href="../<?php echo "$i[logo] "; ?>">
    <style>
        img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<body onload='window.print()' style="font-family: arial;font-size: 12px;">

    <?php
    $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM setting WHERE id_setting = '1'"));
    $id_siswa = $_POST['selector'];
    $N = count($id_siswa);
    for ($i = 0; $i < $N; $i++) {
        $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id_siswa[$i]'");
        while ($r = mysqli_fetch_array($data)) {
            $t = date("d - m - Y", strtotime($r['tgl_lahir']));
            $tgl = date("dmY", strtotime($r['tgl_lahir']));
            $b = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM desain WHERE id = '1' order by id"));
    ?>
            <div style="width: 1020px;height: 315px;margin-bottom: -4px;padding:; background-image: url('../../<?= $b["desain_nisn"]; ?>');">

                <img style="border-radius: 6px;border: ; position: absolute;margin-left: 565px;margin-top: 165px; width: 85px; height: 100px;overflow: hidden;" class="img-responsive img" src="../../<?= $r['file_foto'] ?>">
                <p style="padding-left: 123px;padding-top: 95px; "><b></b></p>
                <table style="margin-top: 67px;padding-left: 690px; position: relative;font-family: arial;font-size: 14px;">
                    <tr>
                        <td style="width: 95px;">NISN</td>
                        <td style="width: 10px;">:</td>
                        <td style="font-weight: bold;"><?= $r['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $r['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?= $r['tempat_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo date('d-m-Y', strtotime($r["tgl_lahir"]));   ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php
                            $l = $r['jk'];
                            if ($l == "L") {
                                echo "Laki-Laki";
                            } else {
                                echo "Perempuan";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

</body>

</html>
<?php }
    } ?>