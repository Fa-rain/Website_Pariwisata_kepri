<?php
session_start();
include '../includes/koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        header("Location: ../pages/login.php?error=empty");
        exit;
    }

    // Query cek user
    $query = mysqli_query($koneksi, 
    "SELECT * FROM user WHERE username='$username' LIMIT 1");

    if (mysqli_num_rows($query) == 1) {

        $data = mysqli_fetch_assoc($query);

        // Cek password
        if ($password === $data['password']) {   // gunakan password_verify jika pakai hashed password

            // Buat session
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];

            header("Location: ../pages/index.php");
            exit;

        } else {
            header("Location: ../pages/login.php?error=wrongpass");
            exit;
        }

    } else {
        header("Location: ../pages/login.php?error=nouser");
        exit;
    }

} else {
    header("Location: ../pages/login.php?error=invalid");
    exit;
}
?>
