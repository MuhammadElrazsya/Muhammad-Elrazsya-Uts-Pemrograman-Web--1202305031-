<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "alat_rs";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal cuy: " . mysqli_connect_error());
}
?>
