<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
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
    <div class="container">
        <br>
        <h1>Library</h1>
        <br><br>
        <div class="row ker  d-flex justify-content-center align-items-center">
            <div class="col-2">
                <h4>Gambar</h4>
            </div>
            <div class="col-5">
                <h4>Nama Game</h4>
            </div>
            <div class="col-2">
                <h4>Harga</h4>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <h4>Aksi</h4>
            </div>
        </div>
        <?php
        include "koneksi.php";

        $idUser = $_SESSION['id'];

        $queryy = "SELECT * FROM library WHERE idUser = $idUser";
        $resultt = mysqli_query($connect, $queryy);
        if (mysqli_num_rows($resultt) > 0) {
            while ($row = mysqli_fetch_array($resultt)) {
                $idGame = $row['idGame'];
                $queryyy = "SELECT * FROM game WHERE id = '$idGame'";
                $resulttt = mysqli_query($connect, $queryyy);
                $rowGame = mysqli_fetch_assoc($resulttt);
        ?>
                <div class="row ker-row justify-content-start align-items-center">
                    <div class="col-2">
                        <img style="width: 100px;border-radius: 10px;" src="img/<?= $rowGame['gambarCover']; ?>" alt="">
                    </div>
                    <div class="col-5">
                        <h4><?= $rowGame['nama']; ?></h4>
                    </div>
                    <div class="col-2">
                        <h4>IDR <?= $rowGame['harga']; ?></h4>
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <a style="font-size: 20px;background-color: #23615F;color : white;padding : 5px 20px;" href="#" class="btn  " role="button" aria-disabled="true">Download</a>
                        <!-- <a href="#" style="text-decoration: none; color :white ; font-size: 20px;" class="align-middle" style="font-size: 24px;">&nbsp;&nbsp;&nbsp;<i class="bi bi-trash " style="font-size: 2rem;"></i></a> -->
                    </div>
                </div>
        <?php
            }
        }
        ?>
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