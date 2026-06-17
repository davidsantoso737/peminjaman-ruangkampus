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
<html>
<head>
<title>Login Admin</title>
</head>
<body>

<h2>Login Admin</h2>

<form method="POST">

Username

<br>

<input type="text" name="username">

<br><br>

Password

<br>

<input type="password" name="password">

<br><br>

<button name="login">
Login
</button>

</form>

</body>
</html>