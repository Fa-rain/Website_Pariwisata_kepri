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

$w = mysqli_fetch_assoc($query);

if (!$w) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $w['nama_wisata']?> | Detail Wisata</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<section class="container">

    <!-- Hero Image -->
    <section class="hero-img">
        <img src="../../../images/wisata/<?= $w['path'] ?>" alt="<?= $w['nama_wisata'] ?>">
    </section>

    <!-- Konten Detail -->
    <article class="wisata-info">
        <h1><?= $w['nama_wisata'] ?></h1>

        <p class="deskripsi">
            <?= nl2br($w['deskripsi']) ?>
        </p>
        <a href="edit.php?id_wisata=<?= $w['id_wisata']?>" class = "btn-success">Edit</a>
        <a href="hapus.php?id_wisata=<?= $w['id_wisata']?>" class = "btn-primary">Hapus</a>
    </article>

</section>

</body>
</html>
