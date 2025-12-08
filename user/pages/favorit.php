<?php

session_start();

include '../includes/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php?login_dulu');
    exit;
}

$id_user = mysqli_real_escape_string($koneksi, $_SESSION['id_user']);

$sql = "SELECT id_favorit, nama_wisata, path  FROM favorit f JOIN wisata w ON
        f.id_wisata = w.id_wisata
        WHERE id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorit</title>
</head>
<body>
    <main>
        <h1>Wisata Favorit Anda</h1>
        <?php while($f = mysqli_fetch_assoc($query)) { ?>
        <div class="card-favorit">
            <img src="../../images/wisata/<?= $f['path']?>" alt="<?= $f['nama_wisata']?>" width= "20%">
            <p><?= $f['nama_wisata']?></p>
            <button><a href="hapus_favorit.php?id_favorit=<?= $f['id_favorit']?>">Hapus</a></button>
        </div>
        <?php } ?>
        
       
            
    </main>
</body>
</html>