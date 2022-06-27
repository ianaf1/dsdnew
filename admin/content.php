<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "v_pagecontent.php";
} elseif ($pg == 'guru') {
    include "mod_guru/guru.php";
} elseif ($pg == 'detail-guru') {
    include "mod_guru/detail_guru.php";
} elseif ($pg == 'rombel') {
    include "mod_rombel/rombel.php";
} elseif ($pg == 'daftar') {
    include "mod_daftar/daftar.php";
} elseif ($pg == 'mutasi') {
    include "mod_daftar/mutasi.php";
} elseif ($pg == 'rekap_siswa') {
    include "mod_daftar/rekap_siswa.php";
} elseif ($pg == 'detail') {
    include "mod_daftar/edit_detail.php";  //Modul Data Siswa
} elseif ($pg == 'tambah_siswa') {
    include "mod_daftar/tambah_siswa.php";  //Modul Data Siswa
} elseif ($pg == 'diterima') {
    include "mod_daftar/daftar_diterima.php";  //modul pendaftar diterima
} elseif ($pg == 'ditolak') {
    include "mod_daftar/daftar_ditolak.php";  //modul pendaftar ditolak / cadangan
} elseif ($pg == 'sekolah') {
    include "mod_sekolah/sekolah.php";
} elseif ($pg == 'jenjang') {
    include "mod_jenjang/jenjang.php";
} elseif ($pg == 'kelas') {
    include "mod_kelas/kelas.php";
} elseif ($pg == 'jenis') {
    include "mod_jenis/jenis.php";
} elseif ($pg == 'biaya') {
    include "mod_biaya/biaya.php";
} elseif ($pg == 'mastermasuk') {
    include "mod_keuangan/keu_masuk_master.php";
} elseif ($pg == 'masterkeluar') {
    include "mod_keuangan/keu_keluar_master.php";
} elseif ($pg == 'transaksi') {
    include "mod_transaksi/transaksi.php";
} elseif ($pg == 'rekap') {
    include "mod_transaksi/rekap.php";
} elseif ($pg == 'bayar') {
    include "mod_bayar/bayar.php";
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'user') {
    include "mod_user/user.php";
} elseif ($pg == 'setting') {
    include "mod_setting/setting.php";
} elseif ($pg == 'kontak') {
    include "mod_kontak/kontak.php";
} elseif ($pg == 'infobayar') {
    include "mod_web/pembayaran.php";
} elseif ($pg == 'syarat') {
    include "mod_web/syarat.php";
} elseif ($pg == 'mastersurat') {
    include "mod_surat/m_surat.php";
} elseif ($pg == 'arsip') {
    include "mod_surat/arsip.php";
} elseif ($pg == 'thn_ajaran') {
    include "mod_thn_ajaran/thn_ajaran.php";
} elseif ($pg == 'scanabsen') {
    include "mod_absen/scanabsen.php";
} elseif ($pg == 'masterabsen') {
    include "mod_absen_master/absen_master.php";
} elseif ($pg == 'presensi') {
    include "mod_presensi/presensi.php";
} elseif ($pg == 'presensi_kelas') {
    include "mod_presensi/presensi_kelas.php";
} elseif ($pg == 'rekap_presensi') {
    include "mod_presensi/rekap_presensi.php";
} elseif ($pg == 'mesin') {
    include "mod_rfid/mesin.php";
} elseif ($pg == 'rfid') {
    include "mod_rfid/rfid.php";
}
