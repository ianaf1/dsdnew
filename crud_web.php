<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();

if ($pg == 'login') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $adminQ = mysqli_query($koneksi, "select * from user where username='$username' and status='1'");
    $adminR = mysqli_fetch_array($adminQ);
    $guruQ = mysqli_query($koneksi, "SELECT * FROM ptk WHERE nuptk='$username'");
    $guruR = mysqli_fetch_array($guruQ);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nis='$username'");
    $siswaR = mysqli_fetch_array($siswaQ);

    if (mysqli_num_rows($siswaQ) == 1) {
        $_SESSION['id_siswa'] = $siswa['id_daftar'];
        mysqli_query($koneksi, "UPDATE daftar set online='1' where id_daftar='$siswa[id_daftar]'");
        $data = [
            'pesan' => 'ok'
        ];
        echo json_encode($data);
    } elseif (mysqli_num_rows($adminQ) == 1) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['level'] = $user['level'];
        $data = [
            'pesan' => 'ok'
        ];
        echo json_encode($data);
    } elseif (mysqli_num_rows($guruQ) == 1) {
        $_SESSION['id_ptk'] = $guru['id_ptk'];
        mysqli_query($koneksi, "UPDATE ptk set online='1' where id_ptk='$guru[id_ptk]'");
        $data = [
            'pesan' => 'ok'
        ];
        echo json_encode($data);
    } else {
        $data = [
            'pesan' => 'Anda belum terdaftar silahkan melakukan pendaftaran!'
        ];
        echo json_encode($data);
    }
}
if ($pg == 'loginadm') {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_query($koneksi, "select * from user where username='$username' and status='1'");
    $ceklogin = mysqli_num_rows($query);
    $user = mysqli_fetch_array($query);
    if ($ceklogin == 1) {
        if (!password_verify($password, $user['password'])) {
            echo "salah";
        } else {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['level'] = $user['level'];
            echo "ok";
        }
    } else {
        echo "oo";
    }
}
if ($pg == 'loginguru') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $guruQ = mysqli_query($koneksi, "SELECT * FROM ptk WHERE nuptk='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($guruQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan melakukan pendaftaran!'
            ];
            echo json_encode($data);
        } else {
            $guru = mysqli_fetch_array($guruQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $guru['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_ptk'] = $guru['id_ptk'];
                mysqli_query($koneksi, "UPDATE ptk set online='1' where id_ptk='$guru[id_ptk]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}
