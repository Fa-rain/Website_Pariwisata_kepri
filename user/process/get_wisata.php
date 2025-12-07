<?php
include '../includes/koneksi.php';

$id_kategori = $_GET['id_kategori'];

$query = mysqli_query($koneksi, 
    "SELECT * 
     FROM wisata 
     WHERE id_kategori = '$id_kategori'");

if(mysqli_num_rows($query) == 0){
    echo "<p>Tidak ada wisata pada kategori ini.</p>";
    exit;
}

echo "<div class='card-container'>";

while($w = mysqli_fetch_assoc($query)){ ;
    echo "
        <div class='card-wisata'>
            <img src='../../images/wisata/{$w['path']}' alt='{$w['nama_wisata']}'>
            <h3>{$w['nama_wisata']}</h3>
            <a href='detail.php?id_wisata={$w['id_wisata']}' class='detail-btn'>Lihat Detail</a>
        </div>
    ";
}

echo "</div>";
?>