<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'data') {
    include "mod_data/data.php";
} elseif ($pg == 'detail') {
    include "mod_data/detail.php";  //Modul Detail Pendaftaran
// } elseif ($pg == 'pengumuman') {
//     include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'alamat') {
    include "mod_data/alamat.php";
} elseif ($pg == 'pendidikan') {
    include "mod_data/pendidikan.php";
} elseif ($pg == 'kepegawaian') {
    include "mod_data/kepegawaian.php";
} elseif ($pg == 'tugas') {
    include "mod_data/tugas.php";
} elseif ($pg == 'tunjangan') {
    include "mod_data/tunjangan.php";
}
