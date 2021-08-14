<?php
$sql = mysqli_query($koneksi, "select max(nis) as maxID from daftar");
$data = mysqli_fetch_array($sql);

$kode = $data['maxID'];

$nourut = (int) substr($kode, 14, 4);
$nourut++;
$ket = "131236010019";
$th = "21";
$nisbaru = $ket . $th . sprintf("%04s", $nourut);

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 font-weight-bold text-gray-800">DATA SISWA</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Siswa Mutasi</h5>
            <div class="card-header-action">
                <!-- <a class="btn btn-primary btn-sm" href="mod_daftar/export/export_excel.php" role="button"><i class="fas fa-download"></i> Download Excel</a> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table style="font-size: 14px" class="table table-bordered table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">TTL</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">TTL</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "select * from daftar a join kelas b ON a.id_kelas=b.id_kelas where a.status='2' order by a.nama");
                        $no = 0;
                        while ($daftar = mysqli_fetch_array($query)) {
                            $no++;
                            $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' "));
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $daftar['nama'] ?></td>
                                <td class="text-center"><?= $daftar['nis'] ?></td>
                                <td> <?= $daftar['tempat_lahir'] . "," . $daftar['tgl_lahir'] ?></td>
                                <td class="text-center"><?= $daftar['nama_kelas'] ?></td>
                                <td class="text-center">
                                    <?php if ($daftar['status'] == 1) { ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Mutasi</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=detail&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                        <i class="fas fa-edit    "></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-editkelas<?= $no ?>">
                                        <i class="fas fa-edit    "></i>
                                    </button>
                                    <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="form-edit<?= $no ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $daftar['id_daftar'] ?>" name="id_daftar" class="form-control" required="">

                                                        <div class="form-group">
                                                            <div class="control-label">Pilih Status</div>
                                                            <div class="custom-switches-stacked mt-2">
                                                                <label class="custom-switch">
                                                                    <input type="radio" name="status" value="1" class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description">Aktif</span>
                                                                </label>
                                                                <label class="custom-switch">
                                                                    <input type="radio" name="status" value="2" class="custom-switch-input">
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description">Mutasi</span>
                                                                </label>


                                                            </div>
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

                                    <div class="modal fade" id="modal-editkelas<?= $no ?>" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="form-editkelas<?= $no ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kelas</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $daftar['id_daftar'] ?>" name="id_daftar" class="form-control" required="">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm-10">
                                                                <select class='form-control' name='kelas'>
                                                                    <option value=''>Pilih Kelas</option>";
                                                                    <?php foreach ($kelas as $val) { ?>
                                                                        <?php if ($daftar['kelas'] == $val) { ?>
                                                                            <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                                        <?php  } else { ?>
                                                                            <option value='<?= $val ?>'><?= $val ?> </option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
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

                                </td>
                            </tr>
                            <script>
                                $('#form-edit<?= $no ?>').submit(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'mod_daftar/crud_daftar.php?pg=status',
                                        data: $(this).serialize(),
                                        success: function(data) {

                                            iziToast.success({
                                                title: 'OKee!',
                                                message: 'Status Berhasil diubah',
                                                position: 'topRight'
                                            });
                                            setTimeout(function() {
                                                window.location.reload();
                                            }, 2000);
                                            $('#modal-edit<?= $no ?>').modal('hide');
                                            //$('#bodyreset').load(location.href + ' #bodyreset');
                                        }
                                    });
                                    return false;
                                });
                            </script>
                            <script>
                                $('#form-editkelas<?= $no ?>').submit(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'mod_daftar/crud_daftar.php?pg=simpankelas',
                                        data: $(this).serialize(),
                                        success: function(data) {

                                            iziToast.success({
                                                title: 'OKee!',
                                                message: 'Status Berhasil diubah',
                                                position: 'topRight'
                                            });
                                            setTimeout(function() {
                                                window.location.reload();
                                            }, 2000);
                                            $('#modal-editkelas<?= $no ?>').modal('hide');
                                            //$('#bodyreset').load(location.href + ' #bodyreset');
                                        }
                                    });
                                    return false;
                                });
                            </script>

                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    var cleaveI = new Cleave('.nis', {

        blocks: [18]

    });
    // var cleaveI = new Cleave('.nohp', {
    //     blocks: [4, 4, 4, 5]
    // });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=tambah',
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
                $('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });

    $('#dataTable').on('click', '.hapus', function() {
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
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
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
            url: 'mod_daftar/crud_daftar.php?pg=import',
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
<script>
    $('#form-konfirmasi').submit(function(e) {
        e.preventDefault();
        swal({
            title: 'Apa kamu yakin ?',
            text: 'Akan Menghapus data anda ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=konfirmasi',
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data) {
                        iziToast.success({
                            title: 'Terimakasih!',
                            message: 'Data Berhasil di Hapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                });
            }
        })

    });
</script>