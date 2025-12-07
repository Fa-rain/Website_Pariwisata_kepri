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
                        <img src="../assets/images/builder/logo_pariwisata_kepri.png" alt="logo" width="" height="200%" class="logo">
                    </a>
                </li>
            </div>

            <div class="nav-mid">
                <li><a href="#" id="">Rekomendasi Ikonik</a></li>
                <li><a href="#" id="openModal">Destinasi Wisata</a></li>
                <li><a href="#" id="">Rencanakan Perjalananmu</a></li>
            </div>

            <div class="nav-right">
                <li><a href="#"><img src="../assets/images/builder/heart-icon.png" alt="favorite" class="icon"></a></li>
                <li><a href="#"><img src="../assets/images/builder/user-icon.png" alt="account" class="icon"></a></li>
            </div>
        </ul>
    </div>

    <!-- HERO -->
     <div class="hero">
        <img src="../assets/images/builder/website_banner.png" alt="" class="banner">
     </div>

</header>