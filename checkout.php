<?php
session_start();
include "koneksi.php";

$idGame = $_POST['idGame'];
$idUser = $_POST['idUser'];

$queryy = "SELECT * FROM user WHERE id = $idUser";
$resultt = mysqli_query($connect, $queryy);
$rowUser = mysqli_fetch_assoc($resultt);

$queryyy = "SELECT * FROM game WHERE id = $idGame";
$resulttt = mysqli_query($connect, $queryyy);
$rowGame = mysqli_fetch_assoc($resulttt);

$saldoo = $rowUser['saldo'];
$saldo = $saldoo - $rowGame['harga'];

$harga =  $rowGame['harga'];


if (isset($_POST['submit'])) {
    if ($saldo < 0) {
        header("Location:Transaksi.php?id=$idGame");
    } else {
        $query1 = "INSERT INTO transaksi (idUser , idGame , totalBayar) 
        VALUES ('$idUser' , '$idGame' , '$harga')";
        $result1 = mysqli_query($connect, $query1);

        $query2 = "INSERT INTO library (idGame , idUser) VALUES ('$idGame' , '$idUser')";
        $result2 = mysqli_query($connect, $query2);

        $query3 = "UPDATE user SET saldo='$saldo' WHERE id=$idUser";
        $result3 = mysqli_query($connect, $query3);
        header("Location:index.php");
    }
}

?>
<!-- <script>
    function alertGagal() {
        alert("Pembelian Game Gagal");
    }

    function alertBerhasil() {
        alert("Pembelian Game Berhasil");
    }
</script> -->