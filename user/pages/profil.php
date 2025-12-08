<?php

session_start();

include '../includes/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php?login_dulu');
    exit;
}

$username = mysqli_real_escape_string($koneksi, $_SESSION['username']);

$sql = "SELECT * FROM user WHERE username = '$username'";
$query = mysqli_query($koneksi, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
</head>
<body>
    <main>
        <div class="card-profil">
            <?php while($p = mysqli_fetch_assoc($query)) {?>
                <p><?= $p['username']?></p>
                <p><?= $p['email']?></p>
            <?php } ?>
            <button><a href="edit_profil.php">Detail</a></button>

        </div>
    </main>
</body>
</html>