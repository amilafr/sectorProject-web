<?php
session_start();
include "../../config.php";

$value = $_POST['value'];
$keterangan = $_POST['keterangan'];


$sql = "INSERT INTO skala (value, keterangan) VALUES ($value, '$keterangan')";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Berhasil Input');
            window.location.href=('../info_skala.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Input');
        
        </script>";
}
