<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>DSD - MA AT TAQWA YASTU</title>
    <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <script language='JavaScript'>
        var txt = "DSD - MA AT TAQWA YASTU ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <h4>MA AT-TAQWA <img src="<?= $setting['logo'] ?>" alt=""></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <!-- <li class="scroll-to-section"><a href="#features">Features</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
                            <li class="scroll-to-section">
                                <div class="main-blue-button"><a href="#contact">Get Your Quote</a></div>
                            </li> -->
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Jumlah Guru:</h6>
                                            <h4><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where status = '1'")) ?></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Jumlah Siswa:</h6>
                                            <h4><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where status = '1'")) ?></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>DATA SEKOLAH DIGITAL</h2>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="main-green-button scroll-to-section">
                                            <a href="#contact">Get Your Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="col-sm-4">
                                    <div class="card card-login">
                                        <div class="card-body">
                                            <img src="<?= $setting['logo_sidadik'] ?>" alt="" width="100%">
                                            <br>
                                            <p>
                                            <h3 style="color:green; font-family:monospace; text-align:center ">LOGIN SISWA</h3>
                                            </p>
                                            <form id="form-login">
                                                <div class="form-group">
                                                    <span class="fa fa-user"></span>
                                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <span class="fa fa-key"></span>
                                                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary btn-block btn-login" id="btnsimpan">
                                                    Masuk
                                                </button>
                                            </form>
                                            <br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span>Copyright &copy; <?= date('Y') ?> MA AT-TAQWA YASTU | By <a href="https://www.instagram.com/ianfatah1/">Ian Fatah</a></span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>