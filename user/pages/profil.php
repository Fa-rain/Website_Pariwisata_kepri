<?php

session_start();

include '../includes/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php?login_dulu');
    exit;
}

$id_user = (int) $_SESSION['id_user'];

$sql = "SELECT * FROM user WHERE id_user = $id_user LIMIT 1";
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
                <p><b>Username : </b><?= $p['username']?></p>
                <p><b>Email    :</b><?= $p['email']?></p>
                <p><b>Password :</b>************</p>
            <?php } ?>
            <button><a href="edit_profil.php?id_user=<?= $id_user;?>">Edit</a></button>

        </div>
    </main>
</body>
</html>