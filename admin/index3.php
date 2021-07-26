<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");


if (isset($_SESSION['id_user'])) {
  $user = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user='$_SESSION[id_user]'"));
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Data Sekolah Digital &mdash; Yastu</title>

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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">

    <script src="../assets/modules/jquery.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>




    <style>
      .modal-backdrop {
        position: inherit;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 900;
        background-color: #000;

      }
    </style>
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg green"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>

          </form>
          <ul class="navbar-nav navbar-right">


            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?= $user['nama_user'] ?></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">

                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.php">DSD</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.php">DSD</a>
            </div>
            <!-- INCLUDE MENU UTAMA DI MENU.PHP -->
            <?php include "v_sidebar.php" ?>
            <!-- <div class="mt-4 mb-3 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <?php include "content.php"; ?>
          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; <?= date('Y') ?> DSD <div class="bullet"></div> By <a href="https://www.instagram.com/ianfatah1/">Ian Fatah</a>
          </div>
          <div class="footer-right">

          </div>
        </footer>
      </div>
    </div>

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

  </html>
<?php
} else {
  include "login.php";
}

?>