<?php
session_start();
include "../../config.php";

$id_case = $_GET['id_case'];


$sql = "DELETE FROM matrix_keputusan WHERE id_case = $id_case";

$a = $koneksi->query($sql);
if ($a === true) {
    $sql2 = "DELETE FROM cases WHERE id_case = $id_case";
    $b = $koneksi->query($sql2);
    if ($b === true) {
        echo "<script>
            alert ('Kasus Berhasil Dihapus');
            window.location.href=('../p_input.php');
            </script>";
    } else {
        echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
    }
} else {
    echo "<script>
        alert ('Gagal Hapus');
        
        </script>";
}
