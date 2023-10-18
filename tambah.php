<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $cover_image = $_FILES["sampul"]["name"];
    $imagetmpname = $_FILES["sampul"]["tmp_name"];
    move_uploaded_file($imagetmpname, "assets/$cover_image");
    echo "<script>alert('Buku berhasil ditambahkan');</script>";
    
        // echo "<script>alert('gagal menambahkan buku');</script>";
    

    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, cover_image) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$cover_image')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form method="POST" enctype="multipart/form-data">
        Judul: <input type="text" name="judul"><br>
        Pengarang: <input type="text" name="pengarang"><br>
        Penerbit: <input type="text" name="penerbit"><br>
        Tahun Terbit: <input type="number" name="tahun_terbit"><br>
        Sampul buku : <input type= "file" name="sampul" accept="image/*">
        <input type="submit" value="Simpan">
    </form>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
