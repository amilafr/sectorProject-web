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

    <title>Input Data</title>

    <!-- Custom fonts for this template-->
    <link href="../view_setting/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../view_setting/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../view_setting/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

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
                    <h1 class="h3 mb-4 text-gray-800">Input Data Kerusakan Bangunan</h1>

                    <!-- <a href="input_kasus.php" role="button" class="btn btn-primary btn-user ">Tambah Kasus</a> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">

                            <form class="inputan" method="POST" action="aksi/p_input_aksi.php">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Jenis Bencana</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jenis_bencana" placeholder="ex: banjir, tsunami, dll..">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Kejadian</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tgl_kejadian">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Lokasi Kejadian</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="lokasi">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Sektor Bangunan</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sektor" placeholder="ex: rumah, jembatan, dll..">
                                    </div>
                                </div>
                                <input type="Submit" class="btn btn-primary btn-user btn-block mt-3" value="Next" style="width: 200px; margin-left: auto; margin-right: auto;">
                            </form>
                            <a href="p_input.php" class="d-flex justify-content-center">Cancel</a>
                            <!-- <a href="p_input.php" class="d-flex justify-content-center mt-3 mb-0">Cancel</a> -->
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