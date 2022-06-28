<?php

include "koneksi.php";

$username = $_POST["username"];
$password = md5($_POST["password"]);
$email = $_POST["email"];
$address = $_POST["address"];
$phonenumber = $_POST["phonenumber"];



$query = "INSERT INTO user (username , email , password , address , noHp , level , foto) VALUES 
    ('$username' , '$email' , '$password' , '$address' , '$phonenumber' , 0 , 'profil-1.jpg')";
$result = mysqli_query($connect, $query);

$queryy = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
$resultt = mysqli_query($connect, $queryy);
$id = mysqli_fetch_assoc($resultt);



if ($result) {
    if ($check["level"] == 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id["id"];
        $_SESSION['leveluser'] = 0;
        header("Location:index.php");
    }
} else {
    header("Location:SignUp.php?error=gagal");
}
