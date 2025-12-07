<?php
include '../../includes/koneksi.php';

$sql = "SELECT * FROM kategori";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Wisata</title>
</head>
<body>

    <h1>Tambah Wisata</h1>

    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">

        <!-- Nama Wisata -->
        <label>Nama Wisata</label><br>
        <input type="text" name="nama_wisata" required><br><br>

        <!-- Deskripsi -->
        <label>Deskripsi Wisata</label><br>
        <textarea name="deskripsi" rows="5" placeholder="Tulis deskripsi wisata..." required></textarea><br><br>

        <!-- Kategori -->
        <label>Kategori</label><br>
        <select name="id_kategori" required>
            <?php while($k = mysqli_fetch_assoc($query)) { ?>
                <option value="<?= $k['id_kategori'] ?>">
                    <?= $k['nama_kategori'] ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <!-- Gambar -->
        <label>Gambar</label><br>
        <input type="file" name="path" accept="image/*" required><br><br>

        <input type="submit" value="Tambah">

    </form>

</body>
</html>
