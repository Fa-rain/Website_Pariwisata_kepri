<?php
include '../../includes/koneksi.php';

// Ambil data
$nama_wisata = $_POST['nama_wisata'];
$deskripsi   = $_POST['deskripsi'];
$id_kategori = $_POST['id_kategori'];
$path        = $_FILES['path'];

// Cek extension
$allowed = ['jpg','jpeg','png','webp'];
$ext = strtolower(pathinfo($path['name'], PATHINFO_EXTENSION));

if(!in_array($ext, $allowed)){
    die('Format file harus JPG, JPEG, PNG, atau WEBP');
}

// Cek ukuran file max 2MB
if($path['size'] > 2 * 1024 * 1024){
    die('Ukuran file terlalu besar, maksimal 2MB');
}

// Nama file baru
$nama_baru = time() . "_" . uniqid() . "." . $ext;

// Lokasi penyimpanan
$target = '../../../images/wisata/' . $nama_baru;

// Upload ke folder
if(!move_uploaded_file($path['tmp_name'], $target)){
    die('Gagal upload file');
}

// Insert database
$sql = "INSERT INTO wisata(nama_wisata, deskripsi, id_kategori, path)
        VALUES ('$nama_wisata', '$deskripsi', '$id_kategori', '$nama_baru')";

mysqli_query($koneksi, $sql);

echo "Berhasil ditambahkan!";
?>
