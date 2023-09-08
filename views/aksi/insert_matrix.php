<?php
session_start();
include "../../config.php";

$sql = "SELECT * FROM kriteria";
$sql2 = "SELECT * FROM alternatif";

$a = $koneksi->query($sql);
$b = $koneksi->query($sql2);

$id_case = $_GET['id_case'];

$nilai_skala = $_POST['nilai_skala'];

$temp_k = array();
while ($row = $a->fetch_assoc()) {
    $temp_k[] = $row['nama_kriteria'];
}
$temp_a = array();
while ($row = $b->fetch_assoc()) {
    $temp_a[] = $row['nama_alternatif'];
}

$tampung_matriks = array();
$index = 0;
for ($i = 1; $i <= count($temp_k); $i++) {
    for ($j = 1; $j <= count($temp_a); $j++) {

        $tampung_matriks[] = [
            'id_case' => $id_case,
            'id_bobot' => $i,
            'id_alternatif' => $j,
            'id_skala' => $nilai_skala[$index]
        ];
        $index++;
    }
}

$a = true;
foreach ($tampung_matriks as $key => $value) {
    $key = $value;
    $sql = "INSERT INTO matrix_keputusan (id_case, id_alternatif, id_bobot, id_skala) VALUES (" . $key['id_case'] . "," . $key['id_alternatif'] . "," . $key['id_bobot'] . "," . $key['id_skala'] . ")";
    $a = $koneksi->query($sql);
}

if ($a === true) {
    echo "<script>
        alert ('Berhasil Input');
        window.location.href=('../p_input.php');
        </script>";
} else {
    echo "<script>
    alert ('Gagal Input');
    
    </script>";
}

// for ($z=0; $z < ; $z++) { 

// }

// echo json_encode($tampung_skala);

foreach ($tampung_matriks as $key => $value) {
    $key = $value;

    echo json_encode($key);
    echo '<br>';
}
