<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<!-- Modal -->
<div class="modal fade" id="modal-kas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-kas">
                <div class="modal-header">
                    <h5 class="modal-title">Download Buku Kas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Bulan</label>
                        <select class="form-control select2" style="width: 100%" name="id_bulan" required>
                            <option value="">Pilih Bulan</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from bulan");
                            while ($bulan = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $bulan['id_bulan'] ?>"><?= $bulan['nama_bulan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Rekap Keuangan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="font-size: 14px" class="table table-bordered table-sm" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Nama Rekap</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Bos-Triwulan 1</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Wali Siswa-Triwulan 1</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Bos-Triwulan 2</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Wali Siswa-Triwulan 2</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Bos-Triwulan 3</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Wali Siswa-Triwulan 3</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td>Bos-Triwulan 4</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td>Wali Siswa-Triwulan 4</td>
                                    <td class="text-center">
                                        <a target='_blank' href='#' class='btn btn-danger btn-sm'><i class='fas fa-download'></i> Download</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#form-kas').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_transaksi/export/export_kas.php',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#modal-kas').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>