<?php

include '../includes/koneksi.php';
include '../includes/header.php';

$query = mysqli_query($koneksi, "SELECT * FROM wisata WHERE
                    nama_wisata = 'Pantai Penjalin'");

?>
<main>
    <center><h1>Wisata Yang Kami Rekomendasikan</h1></center><br>
    
    <?php $w = mysqli_fetch_assoc($query)?>
    <img src="../../images/wisata/<?= $w['path']?>" alt="" width = "100%">
    <h1><?= $w['nama_wisata']?></h1>
    <p><?= $w['deskripsi']?></p>
</main>
<?php
include '../includes/footer.php';
?>