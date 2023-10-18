<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $waw = $_FILES["sampul"]["name"];
    $imagetmpname = $_FILES["sampul"]["tmp_name"];
    

    $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit=$tahun_terbit, cover_image='$waw' WHERE id=$id;";
    $result = mysqli_query($koneksi, $query);
    move_uploaded_file($imagetmpname, "assets/$cover_image");
    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        Judul: <input type="text" name="judul" value="<?= $row['judul']; ?>"><br>
        Pengarang: <input type="text" name="pengarang" value="<?= $row['pengarang']; ?>"><br>
        Penerbit: <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>"><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit']; ?>"><br>
        Sampul buku : <input type= "file" name="sampul" accept="image/*">
        <input type="submit" value="Simpan">
    </form>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
