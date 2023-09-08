<?php
session_start();
include "../config.php";

$un = $_SESSION['username'];
$id_case = $_GET['id_case'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Input Penilaian</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Input Penilaian Kerusakan</h1>
                    <div class="card shadow mb-4 pb-0">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM cases WHERE id_case = $id_case";
                            $a = $koneksi->query($sql);
                            while ($c = $a->fetch_array()) {
                            ?>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">ID Case</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id_case" value="<?= $c['id_case']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Jenis Bencana</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jenis_bencana" value="<?= $c['jenis_bencana']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal Kejadian</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tgl_kejadian" value="<?= $c['tgl_kejadian']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Lokasi Kejadian</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="lokasi" value="<?= $c['lokasi']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Sektor Bangunan</span>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sektor" value="<?= $c['sektor']; ?>" disabled>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                            <!-- <p>Penilaian</p> -->
                            <div class="row mb-3" style="text-align: center; color: black;">
                                <div class="col-3">Kriteria</div>
                                <?php
                                $sqll = "SELECT * FROM alternatif";
                                $bb = $koneksi->query($sqll);
                                while ($d = $bb->fetch_array()) { ?>
                                    <div class="col-3"><?= $d['nama_alternatif']; ?></div>
                                <?php
                                }
                                ?>
                                <!-- <div class="col-3">Alternatif 1</div>
                                <div class="col-3">Alternatif 2</div>
                                <div class="col-3">Alternatif 3</div> -->
                            </div>
                            <form class="inputan" method="POST" action="aksi/insert_matrix.php?id_case=<?= $id_case; ?>">
                                <?php
                                $sql2 = "SELECT * FROM kriteria";
                                $b = $koneksi->query($sql2);
                                while ($d = $b->fetch_array()) { ?>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><?= $d['nama_kriteria']; ?></span>
                                        </div>
                                        <?php
                                        $sql3 = "SELECT * FROM alternatif";
                                        $e = $koneksi->query($sql3);
                                        while ($f = $e->fetch_array()) { ?>
                                            <div class="col-lg-3">
                                                <select style="padding-bottom: 6px; padding-top:6px;" class="form-select input-group" name="nilai_skala[]" aria-label="Default select example">
                                                    <?php
                                                    $sql = "SELECT * FROM skala";
                                                    $a = $koneksi->query($sql);
                                                    while ($c = $a->fetch_array()) { ?>
                                                        <option value="<?= $c['id_skala']; ?>"><?= $c['keterangan']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <input type="submit" class="btn btn-primary btn-user btn-block mt-4" value="Submit" style="width: 200px; margin-left: auto; margin-right: auto;">
                            </form>
                            <!-- <a href="p_input.php" class="d-flex justify-content-center">Cancel</a> -->
                        </div>
                    </div>
                    <hr>

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