<?php
include '../../includes/koneksi.php';

// Ambil data
$id_wisata = $_POST['id_wisata'];
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
$sql = "UPDATE wisata SET
        nama_wisata = '$nama_wisata',
        deskripsi = '$deskripsi',
        id_kategori = '$id_kategori',
        path = '$nama_baru'
        WHERE
        id_wisata = '$id_wisata'";

$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?berhasil");
}else{
    header("location:index.php?gagal");
}
?>
