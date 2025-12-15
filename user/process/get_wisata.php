<?php
include '../includes/koneksi.php';

$id_kategori = $_GET['id_kategori'];
if(!isset($id_kategori)){
    $query = mysqli_query($koneksi,
    "SELECT * FROM wisata");

}else{

    $query = mysqli_query($koneksi, 
        "SELECT * 
        FROM wisata 
        WHERE id_kategori = '$id_kategori'");

    if(mysqli_num_rows($query) == 0){
        echo "<p>Tidak ada wisata pada kategori ini.</p>";
        exit;
    }
}
echo "<div class='card-wisata-container'>";

while($w = mysqli_fetch_assoc($query)){ ;
    echo "
        <article class='card-wisata'>
            <img src='../../images/wisata/{$w['path']}' alt='{$w['nama_wisata']}'>
            <h3>{$w['nama_wisata']}</h3>
            <div class = 'card-footer'>
                <a href='detail.php?id_wisata={$w['id_wisata']}' class='btn-success'>Lihat Detail</a>
            </div>
        </article>
    ";
}

echo "</div>";
?>