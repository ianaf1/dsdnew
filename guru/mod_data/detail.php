<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4><?= $guru['nama'] ?></h4>
                <!-- <div class="card-header-action">
                    <a target="_blank" href="mod_daftar/print_daftar.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Form</a>
                </div> -->
            </div>
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job"><?= $guru['nama'] ?></div>
                </div>
                <div class="author-box-details">

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Data Alamat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li> -->

                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="left"><b>NUPTK/NIP/PegID</b></td>
                                            <td align="left"><?= $guru['nuptk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Password</b></td>
                                            <td align="left"><?= $guru['password'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Nama Lengkap</b></td>
                                            <td align="left"><?= $guru['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>NIK</b></td>
                                            <td align="left"><?= $guru['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $guru['tempat_lahir'] ?>, <?= $guru['tgl_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Jenis Kelamin</b></td>
                                            <td align="left"><?= ($guru['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Agama</b></td>
                                            <td align="left"><?= $guru['agama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>No Handphone</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $guru['no_hp']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Satminkal</b></td>
                                            <td align="left"><?= $guru['satminkal']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-12 col-sm-4 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Progres Pengisian Formulir</h4>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            1
                        </div>
                        <div class="activity-detail">
                            <h5>Data Diri Siswa</h5>
                            <p><span class="badge badge-danger"><i class="fas fa-times-circle    "></i>
                                    Belum lengkap</span></p>
                        </div>
                    </div>

                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            2
                        </div>
                        <div class="activity-detail">
                            <h5>Data Alamat Siswa</h5>
                            <p><span class="badge badge-danger"><i class="fas fa-times-circle    "></i>
                                    Belum lengkap</span></p>
                        </div>
                    </div>
                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            3
                        </div>
                        <div class="activity-detail">
                            <h5>Data Orang Tua</h5>
                            <p><span class="badge badge-danger"><i class="fas fa-times-circle    "></i>
                                    Belum lengkap</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>