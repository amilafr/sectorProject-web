<?php
session_start();
include "../config.php";

$un = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Kerusakan Sektor</title>

    <!-- Custom fonts for this template-->
    <link href="../view_setting/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../view_setting/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "template/sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "template/topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Kejadian Bencana</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT count(id_case) FROM cases";
                                                $b = $koneksi->query($sql);
                                                while ($d = $b->fetch_array()) {
                                                    echo $d['count(id_case)'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Rusak Ringan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT count(id_case) FROM v_result WHERE result = 1";
                                                $b = $koneksi->query($sql);
                                                while ($d = $b->fetch_array()) {
                                                    echo $d['count(id_case)'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Rusak Sedang
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                        $sql = "SELECT count(id_case) FROM v_result WHERE result = 2";
                                                        $b = $koneksi->query($sql);
                                                        while ($d = $b->fetch_array()) {
                                                            echo $d['count(id_case)'];
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Rusak Berat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql = "SELECT count(id_case) FROM v_result WHERE result = 3";
                                                $b = $koneksi->query($sql);
                                                while ($d = $b->fetch_array()) {
                                                    echo $d['count(id_case)'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-store fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Jumlah Kejadian Bencana Indonesia</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" style="width:100%;max-width:800px"></canvas>

                                    <script>
                                        var xValues = [2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022];
                                        var yValues = [1066, 1961, 1694, 2306, 2866, 3397, 3814, 4650, 5402, 2168];

                                        new Chart("myChart", {
                                            type: "line",
                                            data: {
                                                labels: xValues,
                                                datasets: [{
                                                    fill: false,
                                                    lineTension: 0,
                                                    backgroundColor: "rgba(0,0,255,1.0)",
                                                    borderColor: "rgba(0,0,255,0.1)",
                                                    data: yValues
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                    display: false
                                                },
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            min: 0,
                                                            max: 6000
                                                        }
                                                    }],
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Kejadian Per-Jenis Bencana 2022</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart2" style="width:100%;"></canvas>

                                    <script>
                                        var xValues = ["Gempa Bumi", "Karhutla", "Kekeringan", "Banjir", "Tanah Longsor", "Cuaca Ekstrem", "Gelombang Pasang dan Abrasi"];
                                        var yValues = [14, 144, 2, 847, 400, 742, 19];
                                        var barColors = [
                                            "#1C3879",
                                            "#5A8F7B",
                                            "#607EAA",
                                            "#3BACB6",
                                            "#2978B5",
                                            "#5584AC",
                                            "#345B63"
                                        ];

                                        new Chart("myChart2", {
                                            type: "pie",
                                            data: {
                                                labels: xValues,
                                                datasets: [{
                                                    backgroundColor: barColors,
                                                    data: yValues
                                                }]
                                            },
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include "template/footer.php"; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "template/scroll_logout_js.php"; ?>

</body>

</html>