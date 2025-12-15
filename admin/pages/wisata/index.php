<?php
include '../../includes/koneksi.php';

$sql = "SELECT id_wisata, path, nama_wisata, nama_kategori 
        FROM wisata w 
        JOIN kategori k ON w.id_kategori = k.id_kategori";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Wisata</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f5f7fa;
            padding: 20px;
        }

    </style>
</head>
<body>

<section class="container">
    
    <div class="header">
        <h1>Kelola Wisata</h1>
        <a href="tambah.php" class="btn-success">+ Tambah Wisata</a>
    </div>
    
    <article>
        <table class="tabel-wisata">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Wisata</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php while($w = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td>
                        <img 
                            src='../../../images/wisata/<?= $w['path']?>' 
                            alt='<?= $w['nama_wisata']?>'
                            class="img-wisata">
                    </td>
                    <td><?= $w['nama_wisata']?></td>
                    <td><?= $w['nama_kategori']?></td>
                    <td class="aksi">
                        <a href="detail.php?id_wisata=<?= $w['id_wisata']?>" class="btn-primary">Detail</a>
                        <a href="hapus.php?id_wisata=<?= $w['id_wisata']?>" class="btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </article>
</section>

</body>
</html>
