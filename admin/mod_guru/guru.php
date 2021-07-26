<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Guru</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NUPTK/NIP/PegID</label>
                        <input type="text" name="nuptk" class="form-control nuptk" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" required="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-import">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Import File Excel</label>
                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Guru</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" href="mod_guru/export_diterima.php" role="button"> Download Excel</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importdata">
        <i class="fas fa-file-excel    "></i> Import Data</button>
                    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
                        <i class="far fa-edit"></i> Tambah Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Guru</th>
                                <th>NUPTK/NIP</th>
                                <th>Satminkal</th>
                                <th>No Hp</th>
								<th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from ptk");
                            $no = 0;
                            while ($ptk = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $ptk['nama'] ?></td>
                                    <td><?= $ptk['nuptk'] ?></td>
                                    <td><?= $ptk['satminkal'] ?></td>
                                    <td><?= $ptk['no_hp'] ?></td>
									<td><?= $ptk['password'] ?></td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Detai Guru" href="?pg=detail-guru&id=<?= enkripsi($ptk['id_ptk']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
                                        <button data-id="<?= $ptk['id_ptk'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button>
                                    </td>
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
<script>
    var cleaveI = new Cleave('.nuptk', {

        blocks: [20]

    });
    // var cleaveI = new Cleave('.nohp', {
    //     blocks: [4, 4, 4, 5]
    // });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_guru/crud_guru.php?pg=tambah',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'data berhasil disimpan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_guru/crud_guru.php?pg=hapus',
                    method: "POST",
                    data: 'id_ptk=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });

    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_guru/import.php?pg=import',
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

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil Diimport',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
</script>