<?php

include "koneksi.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);



$query = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
$result = mysqli_query($connect, $query);
$check = mysqli_fetch_assoc($result);

var_dump($check);

if ($check) {

    if ($check["level"] == 1) {
        session_start();
        $_SESSION['username'] = 'admin';
        $_SESSION['id'] = $check["id"];
        $_SESSION['leveluser'] = 1;
        header("Location:index.php");
    } else if ($check["level"] == 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $check["id"];
        $_SESSION['leveluser'] = 0;
        header("Location:index.php");
    }
} else {
    header("Location:SignIn.php?error=gagal");
}
