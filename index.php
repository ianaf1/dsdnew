<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Data Siswa Digital | <?= $setting['nama_sekolah'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/modules/animate/animate.css">
    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('assets/img/spinner-primary.svg') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .9;
        }
    </style>
</head>

<body class="layout-3">

    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="." class="navbar-brand sidfebar-gone-hide d-none d-sm-block">
                    <img src="<?= $setting['logo'] ?>" width="50">  Data Siswa Digital <?= $setting['nama_sekolah'] ?>
                </a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">

                    </ul>

                </form>
                <!-- <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Login</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="#" data-id="login" class=" klikmenu dropdown-item has-icon ">
                                <i class="fas fa-sign-out-alt"></i> Admin
                            </a>
                        </div>
                    </li>
                </ul> -->
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link klikmenu" data-id="beranda"><i class="fas fa-home"></i><span>Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link klikmenu " data-id="daftar"><i class="fas fa-users"></i><span>Daftar Siswa</span></a>
                        </li>
                        <!--<li class="nav-item">
                            <a href="#" class="nav-link klikmenu" data-id="daftar"><i class="fas fa-check"></i><span>Data Lengkap</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link klikmenu" data-id="pengumuman"><i class="fas fa-exclamation-triangle"></i><span>Data Belum Lengkap</span></a>
                        </li>-->
                        <!-- <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                    </span>

            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Data Siswa Digital</h1>
                        <div class="section-header-breadcrumb">
                            <button id="btnmasuk" data-id="login" type="button" class="klikmenu btn btn-primary">LOGIN SISWA</button> &nbsp;
                            <button id="btnmasuk" data-id="loginguru" type="button" class="klikmenu btn btn-danger">LOGIN GURU</button> &nbsp;
                            <button id="btnmasuk" data-id="loginadm" type="button" class="klikmenu btn btn-danger">LOGIN ADMIN</button> &nbsp;
                        </div>
                    </div>

                    <div class="section-body ">
                        <div id='isi_load'></div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date('Y') ?>  DSD - MA AT-TAQWA YASTU<div class="bullet"></div>By <a href="https://www.instagram.com/ianfatah1/">Ian Fatah</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- JS DATATABLE -->
    <script src="assets/modules/datatables/datatables.min.js"></script>
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript">
        $('.loader').fadeOut('slow');
        $(document).ready(function() {
            $('.klikmenu').click(function() {
                var menu = $(this).data('id');
                if (menu == "beranda") {
                    $('#btndaftar').show();
                    $('#isi_load').load('home.php');
                } else if (menu == "pendaftaran") {
                    $('#btndaftar').hide();
                    $('#isi_load').load('pendaftaran.php');
                } else if (menu == "daftar") {
                    $('#isi_load').load('datadaftar.php');
                } else if (menu == "pengumuman") {
                    $('#isi_load').load('pengumuman.php');
                } else if (menu == "login") {
                    $('#isi_load').load('login.php');
                } else if (menu == "loginadm") {
                    $('#isi_load').load('loginadm.php')
                } else if (menu == "loginguru") {
                    $('#isi_load').load('loginguru.php')
                }
            });


            // halaman yang di load default pertama kali
            $('#isi_load').load('home.php');

        });
    </script>
    <!-- <a href="#" class="ignielToTop"></a> -->
</body>

</html>