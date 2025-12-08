<?php

session_start();

include '../includes/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php?login_dulu');
    exit;
}

$id_user = mysqli_real_escape_string($koneksi, $_SESSION['id_user']);

$sql = "SELECT * FROM user WHERE id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php while($p = mysqli_fetch_assoc($query)) {?>
        <form action="../process/proses_edit_profil.php" method="post">

            <input type="hidden" name="id_user" value = "<?= $p['id_user'] ?>">

            <label for="">Username</label><br>
            <input type="text" name="username" id="" value = "<?= $p['username'] ?>"><br>

            <label for="">Email</label><br>
            <input type="email" name="email" id="" value = "<?= $p['email'] ?>"><br>

            <label for="">Password</label><br>
            <input type="password" name="password" id=""  value = "<?= $p['password'] ?>"><br>
            <br>
            <input type="submit" value="Simpan">
        </form>
        <?php } ?>
    </main>
</body>
</html>