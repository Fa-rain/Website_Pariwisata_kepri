<?php
session_start();
include '../includes/koneksi.php';

// pastikan user login
if (!isset($_SESSION['id_user'])) {
    header("Location:../pages/login.php?login_dulu");
    exit;
}

$id_user  = $_SESSION['id_user'];

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = $_POST['password'];

// kalau password dikosongkan, jangan update password
if (empty($password)) {
    $sql = "UPDATE user SET
            username = '$username',
            email    = '$email'
            WHERE id_user = $id_user";
} else {
    $password = mysqli_real_escape_string($koneksi, $password);
    $sql = "UPDATE user SET
            username = '$username',
            email    = '$email',
            password = '$password'
            WHERE id_user = $id_user";
}

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:../pages/profil.php?berhasil");
} else {
    header("location:../pages/profil.php?gagal");
}
?>
