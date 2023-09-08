<?php
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND 
        password='$password'");

if (mysqli_num_rows($sql) == 1) {
    $a = $sql->fetch_array();
    $_SESSION['username'] = $username;
    echo "<script>
        alert ('Sukses Login');
        window.location.href=('views/dashboard.php');
        </script>";
} else {
    echo "<script>
    alert ('Gagal Login, username atau password salah');
    window.location.href=('index.php');
    </script>";
}
