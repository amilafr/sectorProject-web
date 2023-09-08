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

    <title>Info - Matrix Keputusan</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Matrix Keputusan</h1>

                    <a href="#" role="button" class="btn btn-primary btn-user ">Tambah Matrix Keputusan</a>
                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Matrix Keputusan DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th>Alternatif</th>
                                            <th>Bobot</th>
                                            <th>Skala</th>
                                            <th>Value Skala</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $sql = "SELECT alternatif.nama_alternatif, skala.keterangan, skala.value as skala_value, bobot.value as bobot_value FROM matrix_keputusan, alternatif, skala, bobot WHERE matrix_keputusan.id_alternatif=alternatif.id_alternatif AND matrix_keputusan.id_skala=skala.id_skala AND matrix_keputusan.id_bobot=bobot.id_bobot";
                                        $a = $koneksi->query($sql);
                                        while ($c = $a->fetch_array()) { ?>
                                            <tr>
                                                <!-- <td><?= $no++; ?></td> -->
                                                <td><?= $c['nama_alternatif']; ?></td>
                                                <td><?= $c['bobot_value']; ?></td>
                                                <td><?= $c['keterangan']; ?></td>
                                                <td><?= $c['skala_value']; ?></td>
                                                <td></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
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