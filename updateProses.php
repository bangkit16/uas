<?php
include "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST["kategori"];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gg = $_FILES['gambar']['name'];
$tmpG = $_FILES['gambar']['tmp_name'];
$gc = $_FILES['cover']['name'];
$tmpC = $_FILES['cover']['tmp_name'];
$query = "UPDATE game SET nama='$nama', gambarCover='$gc', gambar1='$gg', kategori='$kategori', deskripsi='$deskripsi', harga='$harga' WHERE id=$id";

// Cover
move_uploaded_file($tmpC, 'img/' . $gc);
// Gambar
move_uploaded_file($tmpG, 'img/' . $gg);


if (mysqli_query($connect, $query)) {
    echo "Data baru berhasil dibuat";
    header('Location:admin.php');
} else {
    echo "Data baru gagal dibuat<br>" . mysqli_error($connect);
}
mysqli_close($connect);
