<ul class="toggled navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfil" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user-friends"></i>
                <span>Profil</span>
            </a>
            <div id="collapseProfil" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Profil</h6>
                    <a class="collapse-item" href="?pg=detail">Lihat Profil</a>
                    <a class="collapse-item" href="?pg=formulir">Edit Profil</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pg=bayar"">
                <i class=" fas fa-money-bill"></i>
                <span>Pembayaran</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pg=pengumuman">
                <i class="fas fa-user-friends"></i>
                <span>Pengumuman</span></a>
        </li>
    </div>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->