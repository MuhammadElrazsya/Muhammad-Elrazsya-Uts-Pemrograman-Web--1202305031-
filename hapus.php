<?php
include 'koneksi.php';
$id = $_GET['id'];

if (mysqli_query($conn, "DELETE FROM alat WHERE id=$id")) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
