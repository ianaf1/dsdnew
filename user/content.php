<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "v_pagecontent.php";
} elseif ($pg == 'formulir') {
    include "mod_formulir/formulir.php";
} elseif ($pg == 'detail') {
    include "mod_formulir/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'bayar') {
    include "mod_bayar/bayar.php";
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'user') {
    include "mod_user/user.php";
} elseif ($pg == 'setting') {
    include "mod_setting/setting.php";
} elseif ($pg == 'presensi') {
    include "mod_presensi/presensi_siswa.php";
}
