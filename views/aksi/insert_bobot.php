<?php
session_start();
include "../../config.php";

$kriteria = $_POST['kriteria'];
$value = $_POST['value'];


$sql = "INSERT INTO bobot (id_kriteria, value) VALUES ($kriteria, '$value')";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Berhasil Input');
            window.location.href=('../info_bobot.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Input');
        
        </script>";
}
