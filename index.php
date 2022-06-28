<?php
session_start();
include "koneksi.php";

$query = "SELECT * FROM game";
$result = mysqli_query($connect, $query);

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

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner overflow-hidden">
            <div class="carousel-item active">
                <img src="img/carousel-1-elden ring.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h1 class="align-middle" style="font-size: 90px;">Elden Ring</h1>
                    <p class="align-middle" style="font-size: 24px;margin-bottom: -5px;">Now Available On Pentium Game store
                        with 20% discount</p>
                    <p class="align-middle" style="font-size: 20px;">Starting at <s style="color: grey;">IDR 500000</s> IDR 250000</p>
                    <span style="display: inline-block;">
                        <a style="font-size: 35px;background-color: #23615F;color : white;padding : 0px 45px;" href="detail.php?id=12" class="btn  " tabindex="-1" role="button" aria-disabled="true">BUY NOW</a>
                    </span>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-2-battlefireld 2042png.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h1 class="align-middle" style="font-size: 90px;">Battlefield 2042</h1>
                    <p class="align-middle" style="font-size: 24px;margin-bottom: -5px;">Now Available On Pentium Game store
                        with 30% discount</p>
                    <p class="align-middle" style="font-size: 20px;">Starting at <s style="color: grey;">IDR 600000</s> IDR 200000</p>
                    <span style="display: inline-block;">
                        <a style="font-size: 35px;background-color: #23615F;color : white;padding : 0px 45px;" href="detail.php?id=13" class="btn  " tabindex="-1" role="button" aria-disabled="true">BUY NOW</a>
                    </span>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel-3-rise of tomb raider.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start">
                    <h1 class="align-middle" style="font-size: 90px;">Rise of Tomb Raider</h1>
                    <p class="align-middle" style="font-size: 24px;margin-bottom: -5px;">Now Available On Pentium Game store
                        with 20% discount</p>
                    <p class="align-middle" style="font-size: 20px;">Starting at <s style="color: grey;">IDR 400000</s> IDR 250000</p>
                    <span style="display: inline-block;">
                        <a style="font-size: 35px;background-color: #23615F;color : white;padding : 0px 45px;" href="detail.php?id=11" class="btn  " tabindex="-1" role="button" aria-disabled="true">BUY NOW</a>
                    </span>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div style="padding: auto;" class="container">
        <br><br>
        <form action="search.php" method="get">
            <p>Search:</p>
            <div class="row">
                <div class="col-8">

                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search" />
                </div>
                <div class="col-4">

                    <input type="submit" style="background-color: #23615F;border-color: #23615F;" class="btn btn-outline-light btn-lg px-5" value="Search">
                </div>
            </div>
        </form>
        <br>
        <h2>Hot Games this week</h2>
        <hr style="color: green;">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 ">
            <?php


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <img src="img/<?= $row["gambarCover"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 style="font-family: 'Alata', sans-serif;font-size : 22px;" class="card-title"><?= $row["nama"]; ?></h5>
                                <p style="font-family: 'Alata', sans-serif;font-size : 22px;" class="card-text">IDR <?= $row["harga"]; ?></p>
                                <span>
                                    <a style="font-size: 25px;background-color: #23615F;color : white;padding : 5px 40px;" href="detail.php?id=<?= $row["id"]; ?>" class="btn  " role="button" aria-disabled="true">Detail</a>
                                </span>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <div class="footer" style="height: 200px; padding : 20px">
        <div class="container justify-content-end ">
            <br>
            <p>Copyright 2022 Desain Pemrograman Web , Kelompok 4</p>
            <p>Bangkit Maulana Caniago (2131710143)</p>
            <p>Rizqi Zamzam Jamil (2131710089)</p>
            <br>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>