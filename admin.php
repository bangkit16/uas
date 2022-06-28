<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location:index.php");
}
if (!$_SESSION['leveluser'] == 1) {
    header("Location:index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Cuprum&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Pentium Game Store</title>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav float-right">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav> -->
    <nav class="navbar navbar-expand ms-auto mb-2 mb-lg-0  sticky-top ">
        <a class="navbar-brand" href="index.php">Pentium</a>
        <div class="collapse navbar-collapse justify-content-end float-right" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                if (isset($_SESSION['leveluser'])) {

                    if ($_SESSION['leveluser'] == 0) { ?>
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="library.php">Library</a>
                        <a class="nav-link active" aria-current="page" href="profil.php"><?= $_SESSION['username']; ?></a>
                        <a class="nav-link active gren" aria-current="page" href="logout.php">Log Out</a>
                    <?php
                    } else if ($_SESSION['leveluser'] == 1) { ?>
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                        <a class="nav-link active gren" aria-current="page" href="logout.php">Log Out</a>
                    <?php
                    }
                } else { ?>
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="SignIn.php">Sign In</a>
                    <a class="nav-link gren" href="SignUp.php">Sign Up</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">

        <h1>Transaksi</h1>
        <?php
        include "koneksi.php";
        $querytotal = "SELECT SUM(totalBayar) FROM transaksi";
        $total = mysqli_query($connect, $querytotal);
        $pen = mysqli_fetch_array($total);
        ?>
        <h3>Total Pendapatan :IDR <?= $pen['0']; ?></h3>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Id Game</th>
                    <th scope="col">hargaGame</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM transaksi";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($roww = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <th scope="row"><?= $roww['idTransaksi']; ?></th>
                            <td><?= $roww['idUser']; ?></td>
                            <td><?= $roww['idGame']; ?></td>
                            <td><?= $roww['totalBayar']; ?></td>
                        </tr>
                <?php
                    }
                } ?>
            </tbody>
        </table>
        <br>
        <h1>Data Game</h1>
        <hr color="green">
        <br>
        <a class="btn btn-primary" href="tambahAdmin.php">
            Tambah Data
        </a><br><br>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $query = "SELECT * FROM game";
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td> <?php echo $row["id"]; ?> </td>
                            <td> <?php echo $row["nama"]; ?> </td>
                            <td> <?php echo $row["kategori"]; ?> </td>
                            <td> <?php echo $row["deskripsi"]; ?> </td>
                            <td> <?php echo $row["harga"]; ?> </td>
                            <td> <img src="img/<?php echo $row["gambarCover"]; ?>" width="100px"> </td>
                            <td>
                                <a href="updateAdmin.php?id=<?php echo $row["id"]; ?>">
                                    <button class="btn btn-secondary">Edit</button></a>
                                <a href="hapusAdmin.php?id=<?php echo $row["id"]; ?>">
                                    <button class="btn btn-danger">Hapus</button></a>
                            </td>
                    <?php
                    }
                } else {
                    echo "0 results";
                }
                    ?>
                        </tr>
            </tbody>
        </table>
    </div>

    <br>
    <div class="footer" style="height: 200px; padding : 20px;margin-bottom: 0px ;">
        <div class="container justify-content-end ">
            <br>
            <p>Copyright 2022 Desain Pemrograman Web , Kelompok 4</p>
            <p>Bangkit Maulana Caniago (2131710143)</p>
            <p>Rizqi Zamzam Jamil (2131710089)</p>
            <br>
        </div>
    </div> <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>