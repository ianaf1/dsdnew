<?php ob_start();
require "../../../../config/database.php";
require "../../../../config/function.php";
require "../../../../config/functions.crud.php";
include "../../../../assets/modules/phpqrcode/qrlib.php";
$id_surat = dekripsi($_GET['id']);
$surat = fetch($koneksi, 's_arsip', ['id_surat' => $id_surat]);
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $surat['id_daftar']]);

?>

<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="base.min.css" />
    <link rel="stylesheet" href="fancy.min.css" />
    <link rel="stylesheet" href="main.css" />
    <script src="compatibility.min.js"></script>
    <script src="theViewer.min.js"></script>
    <script>
        try {
            theViewer.defaultViewer = new theViewer.Viewer({});
        } catch (e) {}
    </script>
    <title></title>
</head>

<body>
    <div id="sidebar">
        <div id="outline">
        </div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="bg1.png" />
                <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">SURAT KETERANGAN PINDAH</div>
                <div class="t m0 x2 h3 y2 ff2 fs1 fc0 sc0 ls0 ws0">No<span class="fs2">: </span><?= $surat['no_surat'] ?><span class="fs2">/</span>MA-AT/YST/<?= $surat['kode_surat'] ?>/<?= $surat['id_bulan'] ?>/<?= $surat['id_tahun'] ?></div>
                <div class="t m0 x3 h4 y3 ff2 fs3 fc0 sc0 ls0 ws0">Yang <span class="_ _0"></span>bertanda <span class="_ _0"> </span>tangan <span class="_ _0"> </span>di <span class="_ _0"> </span>bawah <span class="_ _0"> </span>ini, <span class="_ _0"> </span>Kepala <span class="_ _0"> </span>Madrasah <span class="_ _0"> </span>Aliyah <span class="_ _0"> </span>AT-TAQWA <span class="_ _0"> </span>YASTU <span class="_ _0"> </span>Pandeglang </div>
                <div class="t m0 x3 h4 y4 ff2 fs3 fc0 sc0 ls0 ws0">menerangkan dengan sesungguhnya bahwa:</div>
                <div class="t m0 x3 h4 y5 ff2 fs3 fc0 sc0 ls0 ws0">A.<span class="_ _1"> </span>Nama<span class="_ _2"> </span>: <span class="ff1"><?= $siswa['nama'] ?></span></div>
                <div class="t m0 x4 h4 y6 ff2 fs3 fc0 sc0 ls0 ws0">Tempat, Tgl. Lahir<span class="_ _3"> </span>: <?= $siswa['tempat'] ?>, <?= $siswa['tgl_lahir'] ?></div>
                <div class="t m0 x4 h4 y7 ff2 fs3 fc0 sc0 ls0 ws0">Jenis Kelamin<span class="_ _4"> </span>: <?php if ($siswa['jenkel'] == 'L') {
                                                                                                                    echo "Laki-Laki";
                                                                                                                } else {
                                                                                                                    echo "Perempuan";
                                                                                                                } ?></div>
                <div class="t m0 x4 h4 y8 ff2 fs3 fc0 sc0 ls0 ws0">Agama<span class="_ _5"> </span>: <?= $siswa['agama'] ?></div>
                <div class="t m0 x4 h4 y9 ff2 fs3 fc0 sc0 ls0 ws0">Alamat<span class="_ _6"> </span>: <?= $siswa['alamat'] ?></div>
                <div class="t m0 x3 h4 ya ff2 fs3 fc0 sc0 ls0 ws0">B.<span class="_ _1"> </span>Diterima di Madrasah </div>
                <div class="t m0 x4 h4 yb ff2 fs3 fc0 sc0 ls0 ws0">Tanggal<span class="_ _7"> </span>: 01 Juli 2019</div>
                <div class="t m0 x4 h4 yc ff2 fs3 fc0 sc0 ls0 ws0">Kelas<span class="_ _8"> </span>: X (Sepuluh) </div>
                <div class="t m0 x4 h4 yd ff2 fs3 fc0 sc0 ls0 ws0">NIS<span class="_ _9"> </span>: 1920.1.090</div>
                <div class="t m0 x3 h4 ye ff2 fs3 fc0 sc0 ls0 ws0">C.<span class="_ _a"> </span>Meninggalkan Madrasah ini </div>
                <div class="t m0 x4 h4 yf ff2 fs3 fc0 sc0 ls0 ws0">Tanggal<span class="_ _7"> </span>: <?= date('d / M / y') ?></div>
                <div class="t m0 x4 h4 y10 ff2 fs3 fc0 sc0 ls0 ws0">Kelas<span class="_ _8"> </span>: <?= $siswa['kelas'] ?></div>
                <div class="t m0 x4 h4 y11 ff2 fs3 fc0 sc0 ls0 ws0">Pindah Ke<span class="_ _b"> </span>: .................................</div>
                <div class="t m0 x4 h4 y12 ff2 fs3 fc0 sc0 ls0 ws0">Alasan Pindah<span class="_ _c"> </span>: Permintaan Orang Tua</div>
                <div class="t m0 x3 h4 y13 ff2 fs3 fc0 sc0 ls0 ws0">D.<span class="_ _a"> </span>Orang Tua / Wali<span class="_ _d"> </span>: <?= $siswa['nama_ayah'] ?></div>
                <div class="t m0 x4 h4 y14 ff2 fs3 fc0 sc0 ls0 ws0">Pekerjaan<span class="_ _e"> </span>: <?= $siswa['pekerjaan_ayah'] ?></div>
                <div class="t m0 x4 h4 y15 ff2 fs3 fc0 sc0 ls0 ws0">Alamat<span class="_ _6"> </span>: <?= $siswa['alamat_ayah'] ?></div>
                <div class="t m0 x3 h4 y16 ff2 fs3 fc0 sc0 ls0 ws0">E.<span class="_ _1"> </span>Administrasi<span class="_ _f"> </span>: -</div>
                <div class="t m0 x4 h4 y17 ff2 fs3 fc0 sc0 ls0 ws0">SPP<span class="_ _10"> </span>: -</div>
                <div class="t m0 x4 h4 y18 ff2 fs3 fc0 sc0 ls0 ws0">Lain-lain<span class="_ _11"> </span>: -</div>
                <div class="t m0 x3 h4 y19 ff2 fs3 fc0 sc0 ls0 ws0">Yang bersangkutan <span class="_ _12"> </span>di atas <span class="_ _12"> </span>adalah benar <span class="_ _12"> </span>siswa Pada <span class="_ _12"> </span>Madrasah Aliyah <span class="_ _12"> </span>AT-TAQWA YASTU </div>
                <div class="t m0 x3 h4 y1a ff2 fs3 fc0 sc0 ls0 ws0">Pandeglang <span class="_ _13"></span>yang <span class="_ _13"></span>kami <span class="_ _13"></span>pimpin. <span class="_ _13"></span>Selama <span class="_ _13"></span>dalam <span class="_ _13"></span>pembinaan <span class="_ _13"></span>kami, <span class="_ _13"></span>siswa <span class="_ _13"></span>tersebut <span class="_ _13"></span>berkelakuan <span class="_ _13"></span>baik </div>
                <div class="t m0 x3 h4 y1b ff2 fs3 fc0 sc0 ls0 ws0">dan tidak ada tanda-tanda kenakalan.</div>
                <div class="t m0 x3 h4 y1c ff2 fs3 fc0 sc0 ls0 ws0">Demikian surat ini kami buat, untuk dapat dipergunakan sebagai mana mestinya.</div>
                <div class="t m0 x5 h4 y1d ff2 fs3 fc0 sc0 ls0 ws0">Pandeglang, <?= date('d / M / y') ?></div>
                <div class="t m0 x5 h4 y1e ff2 fs3 fc0 sc0 ls0 ws0">Kepala Madrasah,</div>
                <div class="t m0 x5 h5 y1f ff1 fs3 fc0 sc0 ls0 ws0">SAMSIAH, S.Pd.I</div>
                <div class="t m0 x5 h4 y20 ff2 fs3 fc0 sc0 ls0 ws0">NIP. 196702011990032001</div>
            </div>
            <div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
        </div>
    </div>
    <div class="loading-indicator">

    </div>
</body>

</html>