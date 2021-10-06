<?php
session_start();
include '../../config/database.php';
include '../../phpqrcode/qrlib.php';

$tempdir = "../../temp/";
if (!file_exists($tempdir))
    mkdir($tempdir);
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
            <div style="width: 1020px;height: 315px;margin-bottom: -4px;padding:; background-image: url('../../<?= $b["desain_pelajar"]; ?>');">
                <img style="position: absolute;margin-left: 40px;margin-top: 65px; width: 140px;" src="../../<?= $a["logo"]; ?>">
                <img style="position: absolute;margin-left: 720px;margin-top: 170px; width: 110px;" src="../../<?= $a["cap"]; ?>">
                <img style="position: absolute;margin-left: 780px;margin-top: 180px; width: 140px;" src="../../<?= $a["ttd"]; ?>">
                <img style="border-radius: 6px;border: ; position: absolute;margin-left: 570px;margin-top: 35px; width: 80px; height: 100px;overflow: hidden;" class="img-responsive img" src="../../<?= $r['file_foto'] ?>">
                <p style="padding-left: 123px;padding-top: 95px; "><b></b></p>
                <table style="margin-top: -80px;padding-left: 680px; position: relative;font-family: arial;font-size: 12px;">
                    <tr>
                        <td style="width: 95px;">NISN</td>
                        <td style="width: 10px;">:</td>
                        <td style="font-weight: bold; width: 190px;"><?= $r['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td text-align=left valign=top>Nama</td>
                        <td text-align=left valign=top>:</td>
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
                    <tr>
                        <td text-align=left valign=top>Alamat</td>
                        <td text-align=left valign=top>:</td>
                        <td style="width:60px">
                            <?= $r['alamat_siswa'] ?>, <?= $r['desa'] ?> <?= $r['kec'] ?> <?= $r['kodepos_siswa'] ?></td>
                    </tr>
                </table>
                <table style="margin-top: 10px;padding-left: 800px; position: relative;font-family: arial;font-size: 12px;">
                    <tr>
                        <td><?= $a["kab"]; ?>, <?php echo date('d-m-Y', strtotime($a["tgl_kartu"]));   ?></td>
                    </tr>
                    <tr>
                        <td>KEPALA, <?= $a["nama_sekolah"]; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong><?= $a["kepala"]; ?></strong></td>
                    </tr>
                    <tr>
                        <td>NIP. <strong><?= $a["nip"]; ?></strong></td>
                    </tr>
                </table>
                <table style="margin-top: -180px;padding-left: 230px; position: relative;font-family: arial;font-size: 12px;">
                    <tr>
                        <td style="font-family:monospace; font-size: 30px;"><strong> KARTU PELAJAR </strong></td>
                    </tr>
                    <tr>
                        <td style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif ;font-size: 25px;"> <?= $a["nama_sekolah"]; ?> </td>
                    </tr>

                </table>
                <table style="margin-top: 10px;padding-left: 230px; position: relative;font-family: arial;font-size: 12px; width:500px ">
                    <tr>
                        <td style="font-family:Arial, Helvetica, sans-serif; font-size: 15px;"> <?= $a["alamat"]; ?> <?= $a["kab"]; ?> <?= $a["no_telp"]; ?></td>
                    </tr>
                    <tr>
                        <td style="font-family:Arial, Helvetica, sans-serif; font-size: 15px;"> <?= $a["email"]; ?></td>
                    </tr>
                </table>
                <table style="margin-top: 45px;padding-left: 550px; position: relative; ">
                    <tr>
                        <td style="font-family:monospace, sans-serif; font-size: 12px; color:floralwhite">Berlaku Selama Menjadi Siswa</td>
                    </tr>

                </table>
            </div>

</body>

</html>
<?php }
    } ?>