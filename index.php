<?php
include "koneksi.php";


$query = "SELECT * FROM buku";
$result = mysqli_query($koneksi, $query);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi CRUD Perpustakaan</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Sampul Buku</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['judul']; ?></td>
                <td><?= $row['pengarang']; ?></td>
                <td><?= $row['penerbit']; ?></td>
                <td><?= $row['tahun_terbit']; ?></td>
                <!-- <?= $img = $row['cover_image']; ?> -->
                <td>
                    <?php
                    echo "<img src=\"assets/$img\" alt=\"Sampul Buku\" style=\"max-width: 100px; max-height: 150px;\">";
                    ?>
                </td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="tambah.php">Tambah Buku</a>
</body>
</html>
