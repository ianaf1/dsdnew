<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();

if ($pg == 'login') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $adminQ = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $adminR = mysqli_fetch_array($adminQ);
    $guruQ = mysqli_query($koneksi, "SELECT * FROM ptk WHERE nuptk='$username' AND password='$password'");
    $guruR = mysqli_fetch_array($guruQ);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$username' AND password='$password'");
    $siswaR = mysqli_fetch_array($siswaQ);

    if (mysqli_num_rows($siswaQ) == 1) {
        $_SESSION['id_siswa'] = $siswaR['id_daftar'];
        mysqli_query($koneksi, "UPDATE daftar set online='1' where id_daftar='$siswaR[id_daftar]'");
        $data = [
            'pesan' => 'siswa'
        ];
        echo json_encode($data);
    } elseif (mysqli_num_rows($adminQ) == 1) {
        $_SESSION['id_user'] = $adminR['id_user'];
        $_SESSION['level'] = $adminR['level'];
        $data = [
            'pesan' => 'admin'
        ];
        echo json_encode($data);
    } elseif (mysqli_num_rows($guruQ) == 1) {
        $_SESSION['id_ptk'] = $guruR['id_ptk'];
        mysqli_query($koneksi, "UPDATE ptk set online='1' where id_ptk='$guruR[id_ptk]'");
        $data = [
            'pesan' => 'guru'
        ];
        echo json_encode($data);
    } else {
        $data = [
            'pesan' => 'Anda belum terdaftar silahkan melakukan pendaftaran!'
        ];
        echo json_encode($data);
    }
}
