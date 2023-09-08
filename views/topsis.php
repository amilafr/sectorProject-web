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

    <title>Perhitungan TOPSIS</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Perhitungan TOPSIS</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="mt-2 mb-2">
                                <a href="p_input.php"><i class="fas fa-fw fa-arrow-left"></i>Kembali</a>
                            </div>
                            <div class="mt-3 mb-5">
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
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#matrix" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">1 - Matriks Keputusan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pembagi" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">2 - Pembagi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#terbobot" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">3 - Normalisasi Terbobot</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#max-min" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">4 - Maximum & Minimum</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#pemisahan" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">5 - Pemisahan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#preferensi" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">6 - Preferensi</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="matrix" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <!-- <h6 class="m-0 font-weight-bold text-primary my-4">Matrix Keputusan</h6> -->
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Matrix Keputusan</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Alternatif</th>
                                                            <th>Nama Alternatif</th>
                                                            <th>ID Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>ID Bobot</th>
                                                            <th>Value</th>
                                                            <th>Nilai</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM vmatrix_keputusan WHERE id_case = " . $id_case;
                                                        $a = $koneksi->query($sql);
                                                        while ($c = $a->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $c['id_alternatif']; ?></td>
                                                                <td><?= $c['nama_alternatif']; ?></td>
                                                                <td><?= $c['id_kriteria']; ?></td>
                                                                <td><?= $c['nama_kriteria']; ?></td>
                                                                <td><?= $c['id_bobot']; ?></td>
                                                                <td><?= $c['value']; ?></td>
                                                                <td><?= $c['nilai']; ?></td>
                                                                <td><?= $c['keterangan']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            <?php
                                                            $sql1 = "SELECT * FROM alternatif";
                                                            $x = $koneksi->query($sql1);
                                                            while ($y = $x->fetch_array()) {
                                                            ?>
                                                                <th>Alternatif <?= $y['id_alternatif']; ?> - <?= $y['nama_alternatif']; ?></th>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM kriteria ORDER BY id_kriteria";
                                                        $a = $koneksi->query($sql);
                                                        while ($c = $a->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td>K<?= $c['id_kriteria']; ?> - <?= $c['nama_kriteria']; ?></td>
                                                                <?php
                                                                $sql2 = "SELECT * FROM vmatrix_keputusan WHERE id_case = " . $id_case . " AND id_kriteria = " . $c['id_kriteria'];
                                                                // $sql2 = "CALL selectMatrix(" . $id_case . "," . $c['id_kriteria'] . ")";
                                                                $e = $koneksi->query($sql2);
                                                                while ($f = $e->fetch_array()) {
                                                                ?>
                                                                    <td><?= $f['nilai']; ?></td>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pembagi" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Nilai Pembagi</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Nilai Pembagi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // $id_case = '23';
                                                        $sql2 = "SELECT * FROM topsis_pembagi WHERE id_case = " . $id_case;
                                                        // $sql2 = "CALL selectPembagi($id_case)";
                                                        $b = $koneksi->query($sql2);
                                                        while ($d = $b->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $d['id_kriteria']; ?></td>
                                                                <td><?= $d['nama_kriteria']; ?></td>
                                                                <td><?= $d['bagi']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="terbobot" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi Terbobot</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Alternatif</th>
                                                            <th>Nama Alternatif</th>
                                                            <th>ID Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>ID Bobot</th>
                                                            <th>Value</th>
                                                            <th>Nilai</th>
                                                            <th>Keterangan</th>
                                                            <th>Normalisasi</th>
                                                            <th>Terbobot</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql4 = "SELECT * FROM topsis_terbobot WHERE id_case = " . $id_case . " ORDER BY id_matrix";
                                                        $g = $koneksi->query($sql4);
                                                        while ($h = $g->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $h['id_alternatif']; ?></td>
                                                                <td><?= $h['nama_alternatif']; ?></td>
                                                                <td><?= $h['id_kriteria']; ?></td>
                                                                <td><?= $h['nama_kriteria']; ?></td>
                                                                <td><?= $h['id_bobot']; ?></td>
                                                                <td><?= $h['value']; ?></td>
                                                                <td><?= $h['nilai']; ?></td>
                                                                <td><?= $h['keterangan']; ?></td>
                                                                <td><?= $h['normalisasi']; ?></td>
                                                                <td><?= $h['terbobot']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="max-min" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Nilai Maximum & Minimum</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Maximum (SIP)</th>
                                                            <th>Minimum (SIN)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM topsis_max_min WHERE id_case = " . $id_case . " ORDER BY id_kriteria";
                                                        $i = $koneksi->query($sql5);
                                                        while ($j = $i->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $j['id_kriteria']; ?></td>
                                                                <td><?= $j['nama_kriteria']; ?></td>
                                                                <td><?= $j['maximum']; ?></td>
                                                                <td><?= $j['minimum']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pemisahan" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Nilai Pemisahan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Alternatif</th>
                                                            <th>Positif (S+)</th>
                                                            <th>Negatif (S-)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql5 = "SELECT * FROM topsis_sip_sin WHERE id_case = " . $id_case;
                                                        $i = $koneksi->query($sql5);
                                                        while ($j = $i->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php
                                                                    $sql6 = "SELECT * FROM alternatif WHERE id_alternatif = " . $j['id_alternatif'];
                                                                    $xx = $koneksi->query($sql6);
                                                                    while ($ii = $xx->fetch_array()) {
                                                                        echo $j['id_alternatif'] . " - " . $ii['nama_alternatif'];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?= $j['dplus']; ?></td>
                                                                <td><?= $j['dmin']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="preferensi" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                                    <div class="card mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Nilai Preferensi (V)</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Ranking</th>
                                                            <th>Nilai V</th>
                                                            <th>Nama Alternatif</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $sql5 = "SELECT * FROM topsis_nilai_v WHERE id_case = " . $id_case . " ORDER BY nilai_v DESC";
                                                        $i = $koneksi->query($sql5);
                                                        while ($j = $i->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $j['nilai_v']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $sql6 = "SELECT * FROM alternatif WHERE id_alternatif = " . $j['id_alternatif'];
                                                                    $xx = $koneksi->query($sql6);
                                                                    while ($ii = $xx->fetch_array()) {
                                                                        echo $ii['nama_alternatif'];
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>