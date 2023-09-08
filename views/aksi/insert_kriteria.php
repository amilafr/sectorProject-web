<?php
session_start();
include "../../config.php";

$kriteria = $_POST['kriteria'];


$sql = "INSERT INTO kriteria (nama_kriteria) VALUES ('$kriteria')";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Berhasil Input');
            window.location.href=('../info_kriteria.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Input');
        
        </script>";
}
