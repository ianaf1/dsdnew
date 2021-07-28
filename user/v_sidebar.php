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
    <div>
        <li class="dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire fa-fw"></i> <span>Profil</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="?pg=detail">Lihat Profil</a></li>
                <li><a class="nav-link" href="?pg=formulir">Edit Profil</a></li>
            </ul>
        </li>

        <li><a class="nav-link" href="?pg=bayar"><i class="fas fa-money-bill    "></i> <span>Pembayaran</span></a></li>
        <li><a class="nav-link" href="?pg=pengumuman"><i class="fas fa-bullhorn fa-fw"></i> <span>Pengumuman</span></a></li>
    </div>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->