<?php
session_start();
include "../../config.php";

$id_alternatif = $_GET['id_alternatif'];


$sql = "DELETE FROM alternatif WHERE id_alternatif = $id_alternatif";

$a = $koneksi->query($sql);
if ($a === true) {
    echo "<script>
            alert ('Alternatif Berhasil Dihapus');
            window.location.href=('../info_alternatif.php');
            </script>";
} else {
    echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
}
