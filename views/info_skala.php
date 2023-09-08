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

    <title>Info - Skala Penilaian</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Skala Penilaian</h1>

                    <!-- <a href="#" role="button" class="btn btn-primary btn-user ">Tambah Skala Penilaian</a> -->
                    <div class="card shadow mb-4 pb-0">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">

                            <form class="inputan" method="POST" action="aksi/insert_skala.php">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Value</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="value">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Keterangan</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="keterangan">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" style="width: 200px; margin-left: auto; margin-right: auto;">
                            </form>
                        </div>
                    </div>
                    <hr>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Skala Penilaian DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th>Value</th>
                                            <th>Keterangan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT * FROM skala";
                                        $a = $koneksi->query($sql);
                                        while ($c = $a->fetch_array()) { ?>
                                            <tr>
                                                <!-- <td><?= $no++; ?></td> -->
                                                <td><?= $c['value']; ?></td>
                                                <td><?= $c['keterangan']; ?></td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-warning">
                                                        <i class="fas fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="aksi/delete_skala.php?id_skala=<?= $c['id_skala']; ?>" onclick="return confirm('Are you sure you want to delete?');" type="button" class="btn btn-danger">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </a>
                                                    <!-- <a href="aksi/delete_skala.php?id_skala=<?= $c['id_skala']; ?>" onclick="return confirm('Are you sure you want to delete?');" type="button" class="btn btn-danger">Delete</a> -->
                                                </td>
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