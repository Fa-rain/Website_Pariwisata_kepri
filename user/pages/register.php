<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
</head>
<body>
    <section class = "register-container">
        <h1>Silakan Register</h1>
        <br>
        <form action="../process/proses_register.php" method="post">
            <label for="">Username</label><br>
            <input type="text" name="username"><br>

            <label for="">Password</label><br>
            <input type="password" name="password" id=""><br>

            <label for="">Email</label><br>
            <input type="email" name="email" id=""><br>
            <br>
            <input type="submit" value="Register">
            <hr>
            <p>Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
    </section>
    
</body>
</html>