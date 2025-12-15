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

        .btn-login-detail {
            background: #0077b6;
            padding: 12px 20px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        /* Container login */
        .login-container {
            background: #ffffff;
            width: 350px;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        /* Judul */
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        /* Label */
        .login-container label {
            float: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        /* Input */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: 0.2s;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #0077b6;
            outline: none;
            box-shadow: 0 0 5px rgba(0,119,182,0.2);
        }

        /* Tombol */
        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #0077b6;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.2s;
        }

        .login-container input[type="submit"]:hover {
            background: #005f8a;
        }
    </style>
</head>
<body>

    <section class="login-container">
        <h1>Silakan Login</h1>

        <form action="../process/proses_login.php" method="post">
            <label for="">Username</label>
            <input type="text" name="username">

            <label for="">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Login">
            <hr>
            <p>belum punya akun?<a href="register.php">Register dulu</a></p>
            
        </form>
    </section>

</body>
</html>
