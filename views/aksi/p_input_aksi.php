<?php
session_start();
include "../../config.php";

// for ($i=1; $i <=15 ; $i++) { 
//     # code...
// }

$tgl_input = date("Y-n-j");

$jenis_bencana = $_POST['jenis_bencana'];
$tgl_kejadian = $_POST['tgl_kejadian'];
$lokasi = $_POST['lokasi'];
$sektor = $_POST['sektor'];

$sql = "INSERT INTO cases (jenis_bencana, tgl_kejadian, lokasi, sektor, tgl_input) VALUES ('$jenis_bencana', '$tgl_kejadian', '$lokasi', '$sektor','$tgl_input')";

$a = $koneksi->query($sql);
// $b = mysqli_num_rows($sql2);
if ($a === true) {
    // $sql2 = "SELECT SCOPE_IDENTITY() AS id";
    $sql2 = "SELECT id_case AS id FROM cases WHERE id_case = @@Identity;";
    $b = $koneksi->query($sql2);

    while ($c = $b->fetch_array()) {
        $id = $c['id'];
        echo "<script> window.location.href=('../input_matrix.php?id_case=" . $id . "'); </script>";
    }
} else {
    echo "<script>
        alert ('Gagal Input');
        
        </script>";
}
