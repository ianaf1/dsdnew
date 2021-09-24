<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Cetak Kartu NISN</h4>

            </div>
        </div>
        <div class="card-header-action">
            <form action="mod_kartu/cetak_pelajar.php" target="_Blank" method="post" class="form-horizontal" role="form">
                <button type="submit" class="pull-right btn btn-flat bg-purple"><i class="fa fa-print"></i> CETAK KARTU PELAJAR</button><br>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="font-size: 12px" class="table table-bordered table-md" id="table-1">
                            <thead>
                                <tr>
                                    <th style="text-align:center; width:10px">
                                        No
                                    </th>
                                    <th style="text-align:center; width:10px">
                                        <Center>Pilih</Center>
                                    </th>
                                    <th>Foto</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th style="text-align:center; width:10px">L/P</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from siswa WHERE status='1'");
                                $no = 0;
                                while ($siswa = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td style="text-align:center; width:10px"><?= $no; ?></td>
                                        <td style="text-align:center; width:10px">
                                            <center>
                                                <input name='selector[]' type='checkbox' name='tandai' class='minimal flat' value="<?= $siswa['id_siswa'] ?>">
                                            </center>
                                        </td>
                                        <td>
                                            <p><img alt="image" src="../<?= $siswa['file_foto'] ?>" class="img-fluid" width=40 height=20></p>
                                        </td>
                                        <td><?= $siswa['nisn'] ?></td>
                                        <td><?= $siswa['nama_siswa'] ?></td>
                                        <td style="text-align:center; width:10px"><?= $siswa['jk'] ?></td>
                                        <td><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                                        <td><?= $siswa['alamat_siswa'] ?>, <?= $siswa['desa'] ?> <?= $siswa['kec'] ?> <?= $siswa['kab'] ?> <?= $siswa['kodepos_siswa'] ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-foto').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_kartu/upload_foto.php?pg=foto',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Jos . . . ',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>