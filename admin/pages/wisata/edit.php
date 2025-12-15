<?php
include '../../includes/koneksi.php';

$id_wisata = $_GET['id_wisata'];
$sqlKategori = "SELECT * FROM kategori";
$queryKategori = mysqli_query($koneksi, $sqlKategori);

$sql = "SELECT * FROM wisata WHERE id_wisata = '$id_wisata'";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Tambah Data Wisata</title>
</head>
<body>
    <div class="header">
        <h1>Perbaharui Wisata</h1>
    </div>
    
    
    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
        <?php while($w = mysqli_fetch_assoc($query)) { ?>
        
        <input type="hidden" name="id_wisata" value="<?= $w['id_wisata'] ?>">
        
        <!-- Nama Wisata -->
        <label>Nama Wisata</label><br>
        <input type="text" name="nama_wisata" required value= "<?= $w['nama_wisata'] ?>"><br><br>

        <!-- Deskripsi -->
        <label>Deskripsi Wisata</label><br>
        <textarea name="deskripsi" rows="5" placeholder="Tulis deskripsi wisata..." required><?= $w['deskripsi'] ?></textarea><br><br>

        <!-- Kategori -->
        <label>Kategori</label><br>
        <select name="id_kategori" required>
            <?php while($k = mysqli_fetch_assoc($queryKategori)) { ?>
                <option value="<?= $k['id_kategori'] ?>">
                    <?= $k['nama_kategori'] ?>
                </option>
            <?php } ?>
        </select>
        <br><br>

        <!-- Gambar -->
        <label>Gambar</label><br>
        <img src="../../../images/wisata/<?= $w['path'] ?>" alt="<?= $w['nama_wisata'] ?>"><br>
        <input type="file" name="path" accept="image/*" required><br><br>

        <input type="submit" value="Simpan">

        <?php } ?>
    </form>

</body>
</html>
