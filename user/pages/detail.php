<?php
include '../includes/koneksi.php';
session_start();

// Ambil ID wisata dari URL
$id = $_GET['id_wisata'] ?? 0;

// Query data wisata
$query = mysqli_query($koneksi, 
"SELECT *
 FROM wisata 
 WHERE id_wisata = '$id' LIMIT 1");

$wisata = mysqli_fetch_assoc($query);

if (!$wisata) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $wisata['nama_wisata']?> | Detail Wisata</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="detail-container">

    <!-- Hero Image -->
    <div class="hero-image">
        <img src="../../images/wisata/<?= $wisata['path'] ?>" alt="<?= $wisata['nama_wisata'] ?>">
    </div>

    <!-- Konten Detail -->
    <div class="wisata-info">
        <h1><?= $wisata['nama_wisata'] ?></h1>

        <p class="deskripsi">
            <?= nl2br($wisata['deskripsi']) ?>
        </p>

        <!-- Tombol Tambah ke Favorit -->
        <?php if (isset($_SESSION['id_user'])) { ?>
            <form action="tambah_favorit.php" method="POST">
                <input type="hidden" name="id_wisata" value="<?= $wisata['id_wisata'] ?>">
                <button type="submit" class="btn-favorit">Tambah ke Favorit</button>
            </form>
        <?php } else { ?>
            <a href="login.php" class="btn-login-detail">Login untuk menyimpan favorit</a>
        <?php } ?>
    </div>

</div>

</body>
</html>
