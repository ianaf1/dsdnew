<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="section-header">


</div>

<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Master Biaya</h5>
                    <select class="form-control" id="camera-select"></select>
                </div>
                <div class="card-body">
                    <section class='content' id="demo-content">
                        <div class='row'>
                            <div class='col-xs-12'>
                                <div class='box'>
                                    <div class='box-header'></div>
                                    <div class='box-body'>
                                        <form id="form-scan">
                                            <div id="sourceSelectPanel" style="display:none">
                                                <label for="sourceSelect">Change video source:</label>
                                                <select id="sourceSelect" style="max-width:400px"></select>
                                            </div>
                                            <div>
                                                <video id="video" width="100%" height="100%" style="border: 1px solid gray"></video>
                                            </div>
                                            <textarea name="id_karyawan" id="result" readonly></textarea>
                                            <label>Result:</label>
                                            <pre><code id="result"></code></pre>
                                            <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../assets/modules/zxing/zxing.min.js"></script>
<script type="text/javascript">
    function decodeOnce(codeReader, selectedDeviceId) {
        codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
            console.log(result)
            document.getElementById('result').textContent = result.text
        }).catch((err) => {
            console.error(err)
            document.getElementById('result').textContent = err
        })
    }

    function decodeContinuously(codeReader, selectedDeviceId) {
        codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'video', (result, err) => {
            if (result) {
                // properly decoded qr code
                console.log('Found QR code!', result)
                document.getElementById('result').textContent = result.text
            }

            if (err) {
                // As long as this error belongs into one of the following categories
                // the code reader is going to continue as excepted. Any other error
                // will stop the decoding loop.
                //
                // Excepted Exceptions:
                //
                //  - NotFoundException
                //  - ChecksumException
                //  - FormatException

                if (err instanceof ZXing.NotFoundException) {
                    console.log('No QR code found.')
                }

                if (err instanceof ZXing.ChecksumException) {
                    console.log('A code was found, but it\'s read value was not valid.')
                }

                if (err instanceof ZXing.FormatException) {
                    console.log('A code was found, but it was in a invalid format.')
                }
            }
        })
    }

    window.addEventListener('load', function() {
        let selectedDeviceId;
        const codeReader = new ZXing.BrowserQRCodeReader()
        console.log('ZXing code reader initialized')

        // codeReader.getVideoInputDevices()
        //     .then((videoInputDevices) => {
        codeReader.decodeFromVideoDevice(undefined, 'video', (result, err) => {
                const sourceSelect = document.getElementById('sourceSelect')
                selectedDeviceId = videoInputDevices[0].deviceId
                if (videoInputDevices.length >= 1) {
                    videoInputDevices.forEach((element) => {
                        const sourceOption = document.createElement('option')
                        sourceOption.text = element.label
                        sourceOption.value = element.deviceId
                        sourceSelect.appendChild(sourceOption)
                    })

                    sourceSelect.onchange = () => {
                        selectedDeviceId = sourceSelect.value;
                    };

                    const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    sourceSelectPanel.style.display = 'block'
                }

                document.getElementById('startButton').addEventListener('click', () => {

                    const decodingStyle = document.getElementById('decoding-style').value;

                    if (decodingStyle == "once") {
                        decodeOnce(codeReader, selectedDeviceId);
                    } else {
                        decodeContinuously(codeReader, selectedDeviceId);
                    }

                    console.log(`Started decode from camera with id ${selectedDeviceId}`)
                })

                document.getElementById('resetButton').addEventListener('click', () => {
                    codeReader.reset()
                    document.getElementById('result').textContent = '';
                    console.log('Reset.')
                })

            })
            .catch((err) => {
                console.error(err)
            })
    })
</script>
<!-- <script type="text/javascript">
    window.addEventListener('load', function() {
        let selectedDeviceId;
        let audio = new Audio("../../assets/audio/beep.mp3");
        const codeReader = new ZXing.BrowserQRCodeReader()
        console.log('ZXing code reader initialized')
        // codeReader.getVideoInputDevices()
        //     .then((videoInputDevices) => {
        codeReader.decodeFromVideoDevice(undefined, 'video', (result, err) => {
                const sourceSelect = document.getElementById('sourceSelect')
                selectedDeviceId = videoInputDevices[0].deviceId
                if (videoInputDevices.length >= 1) {
                    videoInputDevices.forEach((element) => {
                        const sourceOption = document.createElement('option')
                        sourceOption.text = element.label
                        sourceOption.value = element.deviceId
                        sourceSelect.appendChild(sourceOption)
                    })
                    sourceSelect.onchange = () => {
                        selectedDeviceId = sourceSelect.value;
                    };
                    const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    sourceSelectPanel.style.display = 'block'
                }
                codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                    console.log(result)
                    document.getElementById('result').textContent = result.text
                    if (result != null) {
                        audio.play();
                    }
                    $('#button').submit();
                }).catch((err) => {
                    console.error(err)
                    document.getElementById('result').textContent = err
                })
                console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
            })
            .catch((err) => {
                console.error(err)
            })
    })
</script> -->
<script>
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_biaya/crud_biaya.php?pg=tambah',
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
                $('#tambahdata').modal('hide');
                //$('#bodyreset').load(location.href + ' #bodyreset');
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
                    url: 'mod_biaya/crud_biaya.php?pg=hapus',
                    method: "POST",
                    data: 'id_biaya=' + id,
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