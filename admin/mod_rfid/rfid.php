<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">KARTU RFID</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="table-2" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th class="text-center">NO UID</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from rfid");
                                $no = 0;
                                while ($rfid = mysqli_fetch_array($query)) {
                                    $no++;
                                    $nama = mysqli_fetch_array(mysqli_query($koneksi, "select nama from daftar where nis='$rfid[nis]' "));
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $rfid['uid'] ?></td>
                                        <td class="text-center"><?= $nama['nama'] ?></td>
                                        <td class="text-center"><?= $rfid['nis'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                Edit
                                            </button>
                                            <button data-id="<?= $rfid['id'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-edit<?= $no ?>" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form id="form-edituid<?= $no ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data ID</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="<?= $rfid['id'] ?>" name="id" class="form-control" required="">
                                                                <div class="form-group">
                                                                    <label>UID</label>
                                                                    <input type="text" value="<?= $rfid['uid'] ?>" name="uid" class="form-control" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Siswa</label>
                                                                    <select class="form-control select2" style="width: 100%" name="nis" required>
                                                                        <option value="">Pilih Siswa</option>
                                                                        <?php
                                                                        $qqsiswa = mysqli_query($koneksi, "select * from daftar a join kelas b on a.id_kelas=b.id_kelas order by b.nama_kelas");
                                                                        while ($daftarsiswa = mysqli_fetch_array($qqsiswa)) {
                                                                        ?>
                                                                            <option value="<?= $daftarsiswa['nis'] ?>"><?= $daftarsiswa['nama'] ?> | <?= $daftarsiswa['nama_kelas'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
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
                                            <script>
                                                $('#form-edituid<?= $no ?>').submit(function(e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'mod_rfid/crud_rfid.php?pg=ubah',
                                                        data: $(this).serialize(),
                                                        success: function(data) {

                                                            iziToast.success({
                                                                title: 'OKee!',
                                                                message: 'Data Berhasil diubah',
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
</div>
<script>
    $('#table-2').on('click', '.hapus', function() {
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
                    url: 'mod_rfid/crud_rfid.php?pg=hapus',
                    method: "POST",
                    data: 'id=' + id,
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
</script>