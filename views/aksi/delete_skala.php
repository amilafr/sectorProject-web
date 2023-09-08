<?php
session_start();
include "../../config.php";

$id_skala = $_GET['id_skala'];


$sql = "DELETE FROM skala WHERE id_skala = $id_skala";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Skala Berhasil Dihapus');
            window.location.href=('../info_skala.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
}
