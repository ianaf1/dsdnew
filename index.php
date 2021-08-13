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

    <title>MA AT TAQWA YASTU</title>
    <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <!-- <link rel="stylesheet" href="assets/modules/animate/animate.css"> -->


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="dist/assets/css/fontawesome.css">
    <link rel="stylesheet" href="dist/assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="dist/assets/css/animated.css">
    <link rel="stylesheet" href="dist/assets/css/owl.css">
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
                            <div class="left-content wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowcount($koneksi, 'daftar', ['status' => 1]) ?></div>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>DATA SEKOLAH DIGITAL</h2>
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
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
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
                <div class="col-lg-6 align-self-center">
                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h7 class="m-0 font-weight-bold text-primary">Siswa Aktif</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Siswa</th>
                                                <th class="text-center">NIS</th>
                                                <th class="text-center">Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($koneksi, "select * from daftar a join kelas b ON a.id_kelas=b.id_kelas where a.status='1' order by a.nama asc");
                                            while ($daftar = mysqli_fetch_array($query)) {
                                                $no++;
                                                $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' "));
                                            ?>
                                                <tr>
                                                    <td><?= $daftar['nama'] ?></td>
                                                    <td class="text-center"><?= $daftar['nis'] ?></td>
                                                    <td class="text-center"><?= $daftar['nama_kelas'] ?></td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
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
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

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
    </script>
</body>

</html>