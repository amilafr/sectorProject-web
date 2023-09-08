<?php
session_start();
include "../../config.php";

$alternatif = $_POST['alternatif'];


$sql = "INSERT INTO alternatif (nama_alternatif) VALUES ('$alternatif')";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Berhasil Input');
            window.location.href=('../info_alternatif.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Input');
        
        </script>";
}
