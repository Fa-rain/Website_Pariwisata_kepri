<?php

session_start();

include '../../includes/koneksi.php';

$id_wisata = $_GET['id_wisata'];

$sql = "DELETE FROM wisata WHERE id_wisata = '$id_wisata'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:index.php?berhasil");
}else{
    header("location:index.php?gagal");
}

?>