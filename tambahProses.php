<?php
include "koneksi.php";
$nama = $_POST['nama'];
$gg = $_FILES['gambar']['name'];
$tmpG = $_FILES['gambar']['tmp_name'];
$gc = $_FILES['cover']['name'];
$tmpC = $_FILES['cover']['tmp_name'];
$kategori = $_POST["kategori"];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$query = "INSERT INTO game(nama, kategori, deskripsi, harga, gambarCover, gambar1) value
                ('$nama', '$kategori', '$deskripsi', '$harga', '$gc', '$gg')";
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
// include "koneksi.php";
// $nama = $_POST['nama'];
// $cover = uploadC();
// $gambar = uploadG();
// $kategori = $_POST["kategori"];
// $deskripsi = $_POST['deskripsi'];
// $harga = $_POST['harga'];
// $query = "INSERT INTO game(nama, kategori, deskripsi, harga, gambarCover, gambar1) value
//                 ('$nama', '$kategori', '$deskripsi', '$harga', '$cover', '$gambar')";
// // Cover
// function uploadC()
// {
//     $gc = $_FILES['cover']['name'];
//     $tmpC = $_FILES['cover']['tmp_name'];
//     move_uploaded_file($tmpC, 'img/' . $gc);
// }
// // Gambar
// function uploadG()
// {
//     $gg = $_FILES['gambar']['name'];
//     $tmpG = $_FILES['gambar']['tmp_name'];
//     move_uploaded_file($tmpG, 'img/' . $gg);
// }

// if (mysqli_query($connect, $query)) {
//     echo "Data baru berhasil dibuat";
//     header('Location:admin.php');
// } else {
//     echo "Data baru gagal dibuat<br>" . mysqli_error($connect);
// }
// // mysqli_close($connect);
