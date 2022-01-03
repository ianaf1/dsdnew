<?php
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
if ($_GET['id']) {
    $id_bulan = $_GET['id'];
} else {
    $id_bulan = date('m');
}
$bulan = fetch($koneksi, 'bulan', ['id_bulan' => $id_bulan]);
$saldo = mysqli_query($koneksi, "select saldo * from transaksi  order by tgl_bayar asc");
while ($datasaldo = mysqli_fetch_array($saldo)) {
    if ($datasaldo['debit'] == 0) {
        $saldolama = $saldolama + $datasaldo['debit'] - $datasaldo['kredit'];
    } else {
        $saldolama = $saldolama + $datasaldo['debit'];
    }
}
$saldoawal = $saldolama;
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Buku Kas Bulan $bulan[nama_bulan].xls");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title></title>
    <meta name="generator" content="https://conversiontools.io" />
    <meta name="author" content="user" />
    <meta name="created" content="2021-08-02T10:07:55" />
    <meta name="changedby" content="user" />
    <meta name="changed" content="2021-08-02T15:48:08" />
    <meta name="AppVersion" content="15.0300" />
    <meta name="DocSecurity" content="0" />
    <meta name="HyperlinksChanged" content="false" />
    <meta name="LinksUpToDate" content="false" />
    <meta name="ScaleCrop" content="false" />
    <meta name="ShareDoc" content="false" />

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
            font-family: "Calibri";
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
    </style>

</head>

<body>
    <table cellspacing="0" border="0">
        <colgroup width="62"></colgroup>
        <colgroup width="304"></colgroup>
        <colgroup width="43"></colgroup>
        <colgroup width="197"></colgroup>
        <colgroup width="97"></colgroup>
        <colgroup width="105"></colgroup>
        <tr>
            <td colspan=6 height="20" align="center" valign=middle><b>
                    <font face="Tahoma" size=3>BUKU KAS</font>
                </b></td>
        </tr>
        <tr>
            <td colspan=6 height="20" align="center" valign=bottom><b>
                    <font face="Tahoma" color="#000000">MA AT-TAQWA YASTU KADUMERAK - PANDEGLANG</font>
                </b></td>
        </tr>
        <tr>
            <td colspan=6 height="20" align="center" valign=middle>
                <font face="Tahoma">BULAN : <?= $bulan['nama_bulan'] ?></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="21" align="center" valign=middle><b>
                    <font face="Tahoma">Tanggal</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b>
                    <font face="Tahoma">Uraian</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b>
                    <font face="Tahoma">Ref</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b>
                    <font face="Tahoma">Debet (Rp)</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b>
                    <font face="Tahoma">Kredit (Rp)</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><b>
                    <font face="Tahoma">Saldo (Rp)</font>
                </b></td>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "select * from transaksi a join bulan b ON a.id_bulan=b.id_bulan where a.id_bulan='$bulan[id_bulan]' order by a.tgl_bayar asc");
        $no = 0;
        $saldo = $saldoawal;
        while ($transaksi = mysqli_fetch_array($query)) {
            $debit = $transaksi['debit'];
            $kredit = $transaksi['kredit'];
            $no++;
            if ($transaksi['debit'] == 0) {
                $saldo = $saldo + $transaksi['debit'] - $transaksi['kredit'];
            } else {
                $saldo = $saldo + $transaksi['debit'];
            }
        ?>
            <tr>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle bgcolor="#FFFFFF" sdnum="1033;3081;DD-MM-YY;@">
                    <font face="Tahoma"><?= $transaksi['tgl_bayar'] ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle bgcolor="#FFFFFF">
                    <font face="Tahoma"><?= $transaksi['keterangan'] ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF">
                    <font face="Tahoma"><?= $transaksi['ref'] ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                    <font face="Tahoma"><?= "Rp " . number_format($debit, 0, ",", ".") ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                    <font face="Tahoma"><?= "Rp " . number_format($kredit, 0, ",", ".") ?></font>
                </td>
                <td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                    <font face="Tahoma"><?= "Rp " . number_format($saldo, 0, ",", ".") ?></font>
                </td>
            </tr>
        <?php }
        ?>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=top bgcolor="#FFFFFF" sdnum="1033;3081;DD-MM-YY;@">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top bgcolor="#FFFFFF">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top bgcolor="#FFFFFF">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=top bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=top bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=top bgcolor="#FFFFFF" sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <?php
        $total = mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi a join bulan b ON a.id_bulan=b.id_bulan where a.id_bulan='$bulan[id_bulan]'");
        while ($transaksi = mysqli_fetch_array($total)) {
            $totaldebit = $transaksi['totaldebit'];
            $totalkredit = $transaksi['totalkredit'];
            $totalsaldo = $totaldebit - $totalkredit
        ?>
            <tr>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 height="20" align="center" valign=middle><b>
                        <font face="Tahoma">Jumlah</font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
                    <font face="Tahoma"><br></font>
                </td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)"><b>
                        <font face="Tahoma"><?= "Rp " . number_format($totaldebit, 0, ",", ".") ?></font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)"><b>
                        <font face="Tahoma"><?= "Rp " . number_format($totalkredit, 0, ",", ".") ?></font>
                    </b></td>
                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)"><b>
                        <font face="Tahoma"><?= "Rp " . number_format($totalsaldo, 0, ",", ".") ?></font>
                    </b></td>
            </tr>
        <?php }
        ?>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma">Mengetahui</font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td colspan=2 align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"> Pandeglang, <?= buat_tanggal(date('Y-m-d')) ?> </font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma">Kepala Ma At-Taqwa Yastu</font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"> Bendahara </font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle sdnum="1033;0;_(* #,##0_);_(* \(#,##0\);_(* &quot;-&quot;_);_(@_)">
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle><b><u>
                        <font face="Tahoma">SAMSIAH, S.Pd.I</font>
                    </u></b></td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle><b><u>
                        <font face="Tahoma">IRMAN SUKMA</font>
                    </u></b></td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
        <tr>
            <td height="20" align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma">NIP.</font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma">NIP.-</font>
            </td>
            <td align="left" valign=middle>
                <font face="Tahoma"><br></font>
            </td>
        </tr>
    </table>
    <!-- ************************************************************************** -->
</body>

</html>