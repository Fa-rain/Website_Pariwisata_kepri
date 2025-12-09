<?php

session_start();
include '../../includes/koneksi.php';

// Ambil ID wisata dari URL
$id_wisata = $_GET['id_wisata'];

// Query data wisata
$query = mysqli_query($koneksi, 
"SELECT *
 FROM wisata 
 WHERE id_wisata = '$id_wisata' LIMIT 1");

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
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
</head>
<body>

<div class="detail-container">

    <!-- Hero Image -->
    <div class="hero-image">
        <img src="../../../images/wisata/<?= $wisata['path'] ?>" alt="<?= $wisata['nama_wisata'] ?>">
    </div>

    <!-- Konten Detail -->
    <div class="wisata-info">
        <h1><?= $wisata['nama_wisata'] ?></h1>

        <p class="deskripsi">
            <?= nl2br($wisata['deskripsi']) ?>
        </p>
    </div>

</div>

</body>
</html>
