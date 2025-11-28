<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* Background */
        body {
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Silakan Login</h1>

        <form action="../process/proses_login.php" method="post">
            <label for="">Username</label>
            <input type="text" name="username">

            <label for="">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
