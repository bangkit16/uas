<?php
session_start();
include "koneksi.php";

$saldo = $_POST['saldo'];
$id = $_SESSION['id'];


$query = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$saldoAwal = $row['saldo'];

$saldoAkhir = $saldoAwal + $saldo;

if (isset($_POST['submitt'])) {
    $queryy = "UPDATE user SET saldo='$saldoAkhir' WHERE id=$id";
    $resultt = mysqli_query($connect, $queryy);
    header("Location:Profil.php");
}


// if ($resultt) {
//     session_start();
//     $_SESSION['username'] = $username;
//     header("Location:Profil.php");
// } else {
//     header("Location:Profil.php?error=gagal");
// }
