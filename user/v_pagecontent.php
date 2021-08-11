<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        Silahkan lengkapi data diri anda klik tombol ini untuk melengkapi <a class="btn btn-success" href="?pg=formulir" role="button">Lengkapi Data</a>
    </div>
    <?php include "mod_formulir/detail.php" ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="activities">
                        <?php $query = mysqli_query($koneksi, "SELECT * FROM pengumuman where jenis='2'");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary"><?= $data['tgl'] ?></span>
                                        <span class="bullet"></span>
                                        <a class="text-job" href="#">View</a>

                                    </div>
                                    <h5><?= $data['judul'] ?></h5>
                                    <p><?= $data['pengumuman'] ?></p>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>