<?php
session_start();
include '../includes/koneksi.php';

$id_favorit = $_GET['id_favorit'];
$id_user = $_SESSION['id_user'];

$sql = "DELETE FROM favorit WHERE id_favorit ='$id_favorit' AND id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../pages/favorit.php");
    exit;
}else{
    header("location:../pages/favorit.php?gagal");
    exit;
}


?>