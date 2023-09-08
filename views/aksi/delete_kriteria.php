<?php
session_start();
include "../../config.php";

$id_kriteria = $_GET['id_kriteria'];


$sql = "DELETE FROM kriteria WHERE id_kriteria = $id_kriteria";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Kriteria Berhasil Dihapus');
            window.location.href=('../info_kriteria.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
}
