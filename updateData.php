<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    $queryy = "UPDATE user SET username='$username' , email='$email' , address = '$address' , noHp = '$phonenumber' WHERE id=$id";
    $resultt = mysqli_query($connect, $queryy);
    $_SESSION['username'] = $username;
    header("Location:Profil.php");
}


// if ($resultt) {
//     session_start();
//     $_SESSION['username'] = $username;
//     header("Location:Profil.php");
// } else {
//     header("Location:Profil.php?error=gagal");
// }
