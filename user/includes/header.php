<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $judul ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php
    include 'koneksi.php';
?>

<header>
    <!-- NAVIGATION BAR -->
    <div class="navbar">
        <ul>
            <div class="nav-left">
                <li>
                    <a href="index.php">
                        <img src="../assets/images/logo_pariwisata_kepri.png" alt="logo" width="" height="200%" class="logo">
                    </a>
                </li>
            </div>

            <div class="nav-mid">
                <li><a href="#" id="">Rekomendasi Ikonik</a></li>
                <li><a href="#" id="openModal">Destinasi Wisata</a></li>
                <li><a href="#" id="">Rencanakan Perjalananmu</a></li>
            </div>

            <div class="nav-right">
                <li><a href="#"><img src="../assets/images/heart-icon.png" alt="favorite" class="icon"></a></li>
                <li><a href="#"><img src="../assets/images/user-icon.png" alt="account" class="icon"></a></li>
            </div>
        </ul>
    </div>

    <!-- MODAL -->
    <div id="modal" class="modal">
        <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Kategori Wisata</h2>
        <div class="category-grid">
            <?php
                $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                while($kategori = mysqli_fetch_assoc($queryKategori)){ 
            ?>
                <button class='category' ><?=$kategori['nama_kategori']?></button>
            <?php } ?>
        </div>
        </div>
    </div>

    <!-- HERO -->
     <div class="hero">
        <img src="../assets/images/website_banner.png" alt="" class="banner">
     </div>

    <script>
        const modal = document.getElementById("modal");
        const btn = document.getElementById("openModal");
        const span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";
        }

        span.onclick = function() {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
        }

        window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
        }
    </script>
</header>