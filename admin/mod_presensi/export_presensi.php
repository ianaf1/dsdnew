<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
$id_kelas = dekripsi($_GET['id']);
$bulan    = $_GET['bulan'];
$kelas = fetch($koneksi, 'kelas', ['id_kelas' => $id_kelas]);
if ($bulan = 01) {
    $nama_bulan = 'Januari';
} else if ($bulan = 02) {
    $nama_bulan = 'Februari';
} else if ($bulan = 03) {
    $nama_bulan = 'Maret';
} else if ($bulan = '04') {
    $nama_bulan = 'April';
} else if ($bulan = 05) {
    $nama_bulan = 'Mei';
} else if ($bulan = 06) {
    $nama_bulan = 'Juni';
} else if ($bulan = 07) {
    $nama_bulan = 'Juli';
} else if ($bulan = 08) {
    $nama_bulan = 'Agustus';
} else if ($bulan = 09) {
    $nama_bulan = 'September';
} else if ($bulan = 10) {
    $nama_bulan = 'Oktober';
} else if ($bulan = 11) {
    $nama_bulan = 'November';
} else if ($bulan = 12) {
    $nama_bulan = 'Desember';
}
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Siswa Kelas $kelas[nama_kelas].xls");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title></title>
    <meta name="generator" content="https://conversiontools.io" />
    <meta name="author" content="labkomp" />
    <meta name="created" content="2008-04-10T11:05:59" />
    <meta name="changedby" content="user" />
    <meta name="changed" content="2021-07-30T13:59:39" />

    <style type="text/css">
        body,
        div,
        table,
        thead,
        tbody,
        tfoot,
        tr,
        th,
        td,
        p {
            font-family: "Arial";
            font-size: x-small
        }

        a.comment-indicator:hover+comment {
            background: #ffd;
            position: absolute;
            display: block;
            border: 1px solid black;
            padding: 0.5em;
        }

        a.comment-indicator {
            background: red;
            display: inline-block;
            border: 1px solid black;
            width: 0.5em;
            height: 0.5em;
        }

        comment {
            display: none;
        }

        .str {
            mso-number-format: \@;
        }
    </style>

</head>

<body>
    <table cellspacing="0" border="0">
        <colgroup width="5"></colgroup>
        <colgroup width="4"></colgroup>
        <colgroup width="87"></colgroup>
        <colgroup width="169"></colgroup>
        <colgroup width="295"></colgroup>
        <colgroup width="116"></colgroup>
        <tr>
            <td colspan=6 height="24" align="center" valign=middle><b>
                    <font size=3 color="#003366">REKAP PRESENSI SISWA KELAS <?= $kelas['nama_kelas'] ?></font>
                </b></td>
        </tr>
        <tr>
            <td colspan=6 height="24" align="center" valign=middle><b>
                    <font size=3 color="#003366">MA AT-TAQWA YASTU</font>
                </b></td>
        </tr>
        <tr>
            <td colspan=6 height="26" align="center" valign=middle><b>
                    <font size=3 color="#003366">BULAN <?= $nama_bulan ?> TAHUN PELAJARAN 2021/2022</font>
                </b></td>
        </tr>
        <tr>
            <td height="26" align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
            <td align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
            <td align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
            <td align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
            <td align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
            <td align="center" valign=middle><b>
                    <font size=3 color="#003366"><br></font>
                </b></td>
        </tr>
        <tr>
            <td height="24" align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><b>
                    <font face="Arial Narrow">WALI KELAS</font>
                </b></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=middle><b>
                    <font face="Arial Narrow">: </font>
                </b></td>
            <td align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td align="left" valign=middle><b>
                    <font face="Calibri" size=3 color="#003366"><br></font>
                </b></td>
        </tr>
        <tr>
            <td height="17" align="left" valign=middle>
                <font size=3><br></font>
            </td>
            <td align="left" valign=middle>
                <font size=3><br></font>
            </td>
            <td align="left" valign=middle>
                <font size=3><br></font>
            </td>
            <td align="left" valign=middle>
                <font size=3><br></font>
            </td>
            <td align="right" valign=middle><b>
                    <font face="Britannic Bold" size=3><br></font>
                </b></td>
            <td align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
        </tr>
        <tr>
            <td rowspan=2 height="44" align="center" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000" colspan=2 align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">NO</font>
                </b></td>
            <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">N A M A</font>
                </b></td>
            <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">L/P</font>
                </b></td>
            <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">Jumlah Kehadiran</font>
                </b></td>
            <td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">Jumlah Bolos</font>
                </b></td>
        </tr>
        <tr>
            <td align="left" valign=middle>
                <font face="Arial Narrow"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">URUT</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF00"><b>
                    <font face="Arial Narrow">NIS</font>
                </b></td>
        </tr>

        <?php
        if (isset($_GET['bulan'])) {
            $bulan = ($_GET['bulan']);
        } else {
            $bulan = date('m');
        };
        $query = mysqli_query($koneksi, "select * from daftar a join kelas b ON a.id_kelas=b.id_kelas where a.id_kelas='$kelas[id_kelas]' order by a.nama asc");
        $no = 0;
        while ($daftar = mysqli_fetch_array($query)) {
            $no++;
        ?>
            <tr>
                <td height="24" align="left" valign=middle>
                    <font face="Arial Narrow"><br></font>
                </td>
                <td align="left" valign=middle>
                    <font face="Arial Narrow"><br></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1" sdnum="1033;">
                    <font face="Times New Roman" size=3><?= $no; ?></font>
                </td>
                <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle class="str">
                    <font face="Times New Roman" size=3><?= $daftar['nis'] ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=middle>
                    <font face="Times New Roman" size=3><?= $daftar['nama'] ?></font>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle>
                    <font face="Arial Narrow"><?= $daftar['jenkel'] ?></font>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle>
                    <font face="Arial Narrow"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from presensi where nis='$daftar[nis]' AND ket='Hadir' AND MONTH(tgl)='$bulan'")) ?></font>
                </td>
                <td style="border-bottom: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=middle>
                    <font face="Arial Narrow"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from presensi where nis='$daftar[nis]' AND ket='Bolos' AND MONTH(tgl)='$bulan'")) ?></font>
                </td>
            </tr>

        <?php }
        ?>

    </table>
    <!-- ************************************************************************** -->
</body>

</html>