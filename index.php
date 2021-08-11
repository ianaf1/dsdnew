<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <script data-ad-client="ca-pub-8017078778323364" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8017078778323364" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>MA AT TAQWA YASTU</title>
    <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

    <!-- Bootstrap core CSS -->
    <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/modules/animate/animate.css">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="dist/assets/css/fontawesome.css">
    <link rel="stylesheet" href="dist/assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="dist/assets/css/animated.css">
    <link rel="stylesheet" href="dist/assets/css/owl.css">

    <!-- <script language='JavaScript'>
        var txt = "MA AT TAQWA YASTU ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script> -->
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
                            <h4>MA AT-TAQWA</h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#tutor">Tutorial</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
                            <li class="scroll-to-section">
                                <div class="main-blue-button"><a href="#contact">Get Your Quote</a></div>
                            </li>
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
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowcount($koneksi, 'daftar', ['status' => 1]) ?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laki Laki</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where jenkel = 'L' && status = '1'")) ?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fas fa-user fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Perempuan</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where jenkel = 'P' && status = '1'")) ?></div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fas fa-user fa-2x text-gray-300"></i>
                                                    </div>
                                                </div>
                                            </div>
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
                        <div class="col-lg-6 align-self-center">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="card card-login">
                                    <div class="card-body">
                                        <p>
                                        <h3 style="color:green; font-family:monospace; text-align:center ">LOGIN</h3>
                                        <br>
                                        </p>
                                        <form id="form-login">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required autocomplete="off">
                                            </div>
                                            <br>
                                            <div class="form-group">
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

    <div id="tutor" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="dist/assets/images/about-left-image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <h3>Tutorial Pengisian</h3>
                    </div>
                    <div class="row">
                        <div id="player">
                            <iframe width="560" height="315" src="https://www.youtube.com/watch?v=8ym4C67XyRE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <script>
                            // 2. This code loads the IFrame Player API code asynchronously.
                            var tag = document.createElement('script');

                            tag.src = "https://www.youtube.com/iframe_api";
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                            // 3. This function creates an <iframe> (and YouTube player)
                            //    after the API code downloads.
                            var player;

                            function onYouTubeIframeAPIReady() {
                                player = new YT.Player('player', {
                                    height: '390',
                                    width: '640',
                                    videoId: '8ym4C67XyRE',
                                    playerVars: {
                                        'playsinline': 1
                                    },
                                    events: {
                                        'onReady': onPlayerReady,
                                        'onStateChange': onPlayerStateChange
                                    }
                                });
                            }

                            // 4. The API will call this function when the video player is ready.
                            function onPlayerReady(event) {
                                event.target.playVideo();
                            }

                            // 5. The API calls this function when the player's state changes.
                            //    The function indicates that when playing a video (state=1),
                            //    the player should play for six seconds and then stop.
                            var done = false;

                            function onPlayerStateChange(event) {
                                if (event.data == YT.PlayerState.PLAYING && !done) {
                                    setTimeout(stopVideo, 6000);
                                    done = true;
                                }
                            }

                            function stopVideo() {
                                player.stopVideo();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright &copy; <?= date('Y') ?> MA AT-TAQWA YASTU.
                        <br>By <a href="https://www.instagram.com/ianfatah1/">Ian Fatah</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="dist/vendor/jquery/jquery.min.js"></script>
    <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/assets/js/owl-carousel.js"></script>
    <script src="dist/assets/js/animation.js"></script>
    <script src="dist/assets/js/imagesloaded.js"></script>
    <script src="dist/assets/js/custom.js"></script>

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

    <script>
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'crud_web.php?pg=login',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $('#btnsimpan').prop('disabled', false);
                    if (json.pesan == 'siswa') {
                        iziToast.success({
                            title: 'Mantap!',
                            message: 'Login Berhasil',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.href = "user";
                        }, 2000);
                    } else if (json.pesan == 'admin') {
                        iziToast.success({
                            title: 'Mantap!',
                            message: 'Login Berhasil',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.href = "admin";
                        }, 2000);
                    } else if (json.pesan == 'guru') {
                        iziToast.success({
                            title: 'Mantap!',
                            message: 'Login Berhasil',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.href = "guru";
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json.pesan,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        if (jQuery().daterangepicker) {
            if ($(".datepicker").length) {
                $('.datepicker').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    singleDatePicker: true,
                });
            }
            if ($(".datetimepicker").length) {
                $('.datetimepicker').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD hh:mm'
                    },
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: true,
                });
            }
            if ($(".daterange").length) {
                $('.daterange').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    drops: 'down',
                    opens: 'right'
                });
            }
        }
        if (jQuery().select2) {
            $(".select2").select2();
        }
    </script>

</body>

</html>