<?php

include '../../includes/koneksi.php';

$sql = 'SELECT id_wisata, path, nama_wisata, nama_kategori FROM wisata w JOIN kategori k ON
        w.id_kategori = k.id_kategori';
$query = mysqli_query($koneksi, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Kelola Wisata</h1>
    <button class = "btn-success"><a href="tambah_wisata.php">Tambah Wisata</a></button><br>
    <table border = '1' style = "width: 100%">
        <tr>
            <th>Gambar</th>
            <th>Nama Wisata</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php while($w = mysqli_fetch_assoc($query)) {?>
        <tr>
            <td><img src='../../../images/wisata/<?= $w['path']?>' alt='<?= $w['nama_wisata']?>' width = '20%'></td>
            <td><?= $w['nama_wisata']?></td>
            <td><?= $w['nama_kategori']?></td>
            <td>
                <a href="edit_wisata.php?id_wisata=<?= $w['id_wisata']?>">Edit</a>
                <a href="hapus_wisata.php?id_wisata=<?= $w['id_wisata']?>">Hapus</a>
                <a href="detail_wisata.php?id_wisata=<?= $w['id_wisata']?>">Detail</a>
                
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>






