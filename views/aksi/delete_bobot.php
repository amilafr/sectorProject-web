<?php
session_start();
include "../../config.php";

$id_bobot = $_GET['id_bobot'];


$sql = "DELETE FROM bobot WHERE id_bobot = $id_bobot";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Bobot Berhasil Dihapus');
            window.location.href=('../info_bobot.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
}
