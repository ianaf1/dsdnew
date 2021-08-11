<?php
$jan = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=1"));
$feb = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=2"));
$mar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=3"));
$apr = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=4"));
$mei = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=5"));
$jun = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=6"));
$jul = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=7"));
$agu = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=8"));
$sep = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=9"));
$okt = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=10"));
$nov = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=11"));
$des = mysqli_fetch_array(mysqli_query($koneksi, "select sum(debit) as totaldebit, sum(kredit) as totalkredit from transaksi where id_bulan=12"));
$saldojan = $jan['totaldebit'] - $jan['totalkredit'];
$saldofeb = $feb['totaldebit'] - $feb['totalkredit'];
$saldomar = $mar['totaldebit'] - $mar['totalkredit'];
$saldoapr = $apr['totaldebit'] - $apr['totalkredit'];
$saldomei = $mei['totaldebit'] - $mei['totalkredit'];
$saldojun = $jun['totaldebit'] - $jun['totalkredit'];
$saldojul = $jul['totaldebit'] - $jul['totalkredit'];
$saldoagu = $agu['totaldebit'] - $agu['totalkredit'];
$saldosep = $sep['totaldebit'] - $sep['totalkredit'];
$saldookt = $okt['totaldebit'] - $okt['totalkredit'];
$saldonov = $nov['totaldebit'] - $nov['totalkredit'];
$saldodes = $des['totaldebit'] - $des['totalkredit'];
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from ptk")) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rowcount($koneksi, 'daftar', ['status' => 1]) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laki Laki</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where jenkel = 'L' && status = '1'")) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Perempuan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where jenkel = 'P' && status = '1'")) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="kasKeluar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myChartSiswa"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Kelas 10
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Kelas 11
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Kelas 12
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

    </div>

    <div class="col-lg-6 mb-4">


    </div>
</div>
<script>
    var ctx = document.getElementById("myChartSiswa");
    var myChartSiswa = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Kelas 10", "Kelas 11", "Kelas 12"],
            datasets: [{
                data: [
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '10' && status='1'")) ?>,
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '11' && status='1'")) ?>,
                    <?= mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where kelas = '12' && status='1'")) ?>
                ],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("kasKeluar");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?= $saldojan ?>,
                    <?= $saldofeb ?>,
                    <?= $saldomar ?>,
                    <?= $saldoapr ?>,
                    <?= $saldomei ?>,
                    <?= $saldojun ?>,
                    <?= $saldojul ?>,
                    <?= $saldoagu ?>,
                    <?= $saldosep ?>,
                    <?= $saldookt ?>,
                    <?= $saldonov ?>,
                    <?= $saldodes ?>,
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>