    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
                <img src="../<?= $setting['logo'] ?>" width="50" alt="LOGO">
            </div>
            <div class="sidebar-brand-text mx-1"> MA AT-TAQWA<br>YASTU</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Pages Master Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fire fa-fw"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Siswa</h6>
                    <a class="collapse-item" href="?pg=jenjang">Master Jenjang</a>
                    <a class="collapse-item" href="?pg=mastermasuk">Master Pemasukan</a>
                    <a class="collapse-item" href="?pg=masterkeluar">Master Pengeluaran</a>
                    <a class="collapse-item" href="?pg=biaya">Master Biaya</a>
                    <a class="collapse-item" href="?pg=kelas">Master Kelas</a>
                </div>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="?pg=guru">
                <i class="fas fa-address-card"></i>
                <span>Data Guru</span></a>
        </li>

        <!-- Nav Item - Pages Siswa Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Data Siswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Siswa</h6>
                    <a class="collapse-item" href="?pg=daftar">Siswa Aktif</a>
                    <!-- <a class="collapse-item" href="?pg=mutasi">Siswa Mutasi</a> -->
                    <a class="collapse-item" href="?pg=kelas10">Kelas 10</a>
                    <a class="collapse-item" href="?pg=kelas11">Kelas 11</a>
                    <a class="collapse-item" href="?pg=kelas12">Kelas 12</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="?pg=rombel">
                <i class="fas fa-school"></i>
                <span>Rombel</span></a>
        </li>

        <!-- Nav Item - Pages Keuangan Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeuangan" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-money-bill"></i>
                <span>Keuangan</span>
            </a>
            <div id="collapseKeuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Keuangan</h6>
                    <a class="collapse-item" href="?pg=transaksi">Buku Kas</a>
                    <a class="collapse-item" href="?pg=bayar">Pembayaran</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-globe"></i>
                <span>Web</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengumuman</h6>
                    <a class="collapse-item" href="?pg=kontak">Kontak Pendaftaran</a>
                    <a class="collapse-item" href="?pg=infobayar">Info Pembayaran</a>
                    <!-- <a class="collapse-item" href="href=" ?pg=syarat">Info Persyaratan</a> -->
                    <a class="collapse-item" href="?pg=pengumuman">Pengumuman</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <?php if ($user['level'] == 'admin') { ?>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?pg=user">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Managemen User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?pg=setting">
                    <i class="fas fa-toolbox"></i>
                    <span>Managemen Aplikasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        <?php } ?>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->