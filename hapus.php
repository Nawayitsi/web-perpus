<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM buku WHERE id=$id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
