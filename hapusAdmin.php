<?php
include "koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM game WHERE id=$id";

if (mysqli_query($connect, $query)) {
    header('Location:admin.php');
} else {
    echo "Data gagal di hapus <br>" . mysqli_error($connect);
}
mysqli_close($connect);
