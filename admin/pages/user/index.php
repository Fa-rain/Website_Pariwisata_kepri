<?php

include '../../includes/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php $u = mysqli_fetch_assoc($query)?>
        <tr>
            <td><?= $u['username']?></td>
            <td>******</td>
            <td><?= $u['email']?></td>
            <td>
                <a href="hapus.php?id_user=<?= $u['id_user']?>"></a>
            </td>
        </tr>
    </table>
</body>
</html>