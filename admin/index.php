<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");
require("../config/tahun.ajaran.php");

$jan = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=1"));
$feb = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=2"));
$mar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=3"));
$apr = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=4"));
$mei = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=5"));
$jun = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=6"));
$jul = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=7"));
$agu = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=8"));
$sep = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=9"));
$okt = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=10"));
$nov = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=11"));
$des = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=12"));
$saldojan = $jan['totaldebit'] - $jan['totalkredit'];
$saldofeb = $feb['totaldebit'] - $feb['totalkredit'];
$saldomar = $mar['totaldebit'] - $mar['totalkredit'];
$saldoapr = $apr['totaldebit'] - $apr['totalkredit'];
$saldomei = $mei['totaldebit'] - $mei['totalkredit'];
$saldojun = $jun['totaldebit'] - $jun['totalkredit'];
$saldojul = $jul['totaldebit'] - $jul['totalkredit'];
$saldoagu = $agu['totaldebit'] - $agu['totalkredit'];
$saldosep = $sep['totaldebit'] - $sep['totalkredit'];
$saldookt = $okt['totaldebit'] - $okt['totalkredit'];
$saldonov = $nov['totaldebit'] - $nov['totalkredit'];
$saldodes = $des['totaldebit'] - $des['totalkredit'];

if (isset($_SESSION['id_user'])) {
  $user = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user='$_SESSION[id_user]'"));
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DSD - MA AT TAQWA YASTU</title>
    <link rel="shortcut icon" href="../<?= $setting['logo'] ?>" />

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS TOASTR -->
    <link rel="stylesheet" href="../assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css">

    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="../assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/modules/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/components.css">

    <script src="../assets/modules/jquery.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>

    <!-- scan qr -->
    <link rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" href="https://unpkg.com/normalize.css@8.0.0/normalize.css">
    <link rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" href="https://unpkg.com/milligram@1.3.0/dist/milligram.min.css">
  </head>

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include "v_sidebar.php" ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php include "v_topbar.php" ?>
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <?php include "content.php" ?>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <?php include "v_footer.php" ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <!-- <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script> -->
    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <!-- General JS Scripts -->
    <script src="../assets/modules/popper.js"></script>
    <script src="../assets/modules/tooltip.js"></script>
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS DATATABLE -->
    <script src="../assets/modules/datatables/datatables.min.js"></script>
    <script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific DATATABLE -->
    <script src="../assets/js/page/modules-datatables.js"></script>
    <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../assets/modules/summernote/summernote-bs4.js"></script>

    <!-- Scan QR -->
    <script type="text/javascript" src="../assets/webcodecam/js/filereader.js"></script>
    <script type="text/javascript" src="../assets/webcodecam/js/qrcodelib.js"></script>
    <script type="text/javascript" src="../assets/webcodecam/js/webcodecamjs.js"></script>
    <script type="text/javascript" src="../assets/webcodecam/js/main.js"></script>

    <!-- Page Specific JS File -->
    <script src="../assets/js/page/index-0.js"></script>


    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script type="text/javascript">
      var url = window.location;
      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.dropdown-menu a').filter(function() {
        return this.href == url;
      }).closest('.treeview').addClass('active');
    </script>
  </body>
  <script>
    var ctx = document.getElementById("myChartSiswa");
    var myChartSiswa = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Kelas 10", "Kelas 11", "Kelas 12"],
        datasets: [{
          data: [
            <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '10' && status='1'")) ?>,
            <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '11' && status='1'")) ?>,
            <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '12' && status='1'")) ?>
          ],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>
  <script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("kasKeluar");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
          label: "Saldo",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            <?= $saldojan ?>,
            <?= $saldofeb ?>,
            <?= $saldomar ?>,
            <?= $saldoapr ?>,
            <?= $saldomei ?>,
            <?= $saldojun ?>,
            <?= $saldojul ?>,
            <?= $saldoagu ?>,
            <?= $saldosep ?>,
            <?= $saldookt ?>,
            <?= $saldonov ?>,
            <?= $saldodes ?>,
          ],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>

  </html>
<?php
} else {
  include "login.php";
}

?>