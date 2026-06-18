<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($conn,"
        SELECT *
        FROM admin
        WHERE username='$username'
        AND password='$password'
    ");

    if(mysqli_num_rows($cek) > 0){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit;
    }else{
        echo "<script>alert('Login gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-box">
        <h2>🔐 Login Admin</h2>
        <p class="login-subtitle">Masukkan kredensial untuk mengelola sistem</p>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login" class="btn">Login</button>
        </form>
    </div>
</div>

<script src="../assets/script.js"></script>
</body>
</html>