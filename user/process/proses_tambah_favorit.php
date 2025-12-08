<?php

session_start();

include '../includes/koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:../pages/login.php?login_dulu");
}

$id_user  = $_SESSION['id_user'];
$id_wisata = $_POST['id_wisata'];

$sql = "INSERT INTO favorit(id_user, id_wisata) VALUES
        ('$id_user', '$id_wisata')";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:../pages/detail.php?id_wisata={$id_wisata}"."berhasil");
} else {
    header("location:../pages/detail.php?id_wisata={$id_wisata}");
}
?>