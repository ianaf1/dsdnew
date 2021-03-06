<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require("../../config/tahun.ajaran.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Presensi Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/modules/izitoast/css/iziToast.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="icon" href="../assets/img/logo.png">

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Presensi Siswa MA AT-TAQWA YASTU</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Presensi Siswa Hari <?= hari_ini(); ?></h3>
          </div>
          <div class="panel-body text-center">
            <canvas width="240" height="240" id="webcodecam-canvas"></canvas>
            <hr>
            <select></select>
          </div>
          <div class="panel-footer">
            <center><a class="btn btn-danger" href="../">Kembali</a></center>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Js Lib -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/qrcodelib.js"></script>
  <script type="text/javascript" src="js/webcodecamjquery.js"></script>
  <script src="../../assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="../../assets/modules/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript">
    var arg = {
      successTimeout: 2000,
      resultFunction: function(result) {
        $.ajax({
          type: 'POST',
          url: 'crud_absen.php?pg=presen',
          data: 'nis=' + result.code,
          success: function(pesan) {
            var json = $.parseJSON(pesan);
            if (json.pesan == 'masuk') {
              swal({
                title: 'Cihuyy!',
                text: 'Presensi Masuk Berhasil Guys...',
                icon: 'success'
              });
            } else if (json.pesan == 'pulang') {
              swal({
                title: 'Cihuyy!',
                text: 'Presensi Pulang Berhasil Guys...',
                icon: 'success'
              });
            } else if (json.pesan == 'ggl_masuk') {
              swal({
                title: 'Gagal!',
                text: 'Waktu Presensi Udah Lewat, Mangkanya jangan Telat!',
                icon: 'error'
              });
            } else if (json.pesan == 'sudah_absen') {
              swal({
                title: 'Gagal!',
                text: 'Sudah Presensi Masuk Guys...',
                icon: 'error'
              });
            } else if (json.pesan == 'ggl_pulang') {
              swal({
                title: 'Gagal!',
                text: 'Belum Jam Pulang Guys...',
                icon: 'error'
              });
            } else if (json.pesan == 'sudah_presensi') {
              swal({
                title: 'Gagal!',
                text: 'Presensi Sudah Dilakukan Guys...',
                icon: 'error'
              });
            } else {
              swal({
                title: 'Gagal!',
                text: 'Data Gagal Ditemukan Guys...',
                icon: 'error'
              });
            }
          }
        });
        return false;
      }
    };
    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    // decoder.options.successTimeout();
    // decoder.buildSelectMenu('select', 2).init(args);
    // decoder.buildSelectMenu(document.createElement('select'), 'environment|front').init(arg).play();
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function() {
      decoder.stop().play();
    });
  </script>
</body>

</html>