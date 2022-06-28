<?php
session_start();
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

    <nav class="navbar navbar-expand ms-auto mb-2 mb-lg-0  sticky-top ">
        <a class="navbar-brand" href="index.php">Pentium</a>
        <div class="collapse navbar-collapse justify-content-end float-right" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                if (isset($_SESSION['leveluser'])) {

                    if ($_SESSION['leveluser'] == 0) { ?>
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <?php
        include "koneksi.php";


        $idGame = $_GET['id'];

        $query = "SELECT * FROM game WHERE id = $idGame";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);

        ?>
        <br>
        <div class="row g-2">
            <div class="col-5">
                <div class="row g-2">
                    <div class="col-12">
                        <div class="p-3 " style="width: 100%; overflow:hidden">
                            <img src="img/<?= $row['gambar1']; ?>" class="img-fluid" style="width: 100%;;overflow:hidden; border-radius: 10px;" alt="">
                        </div>
                    </div>
                </div>
                <!-- <div class="row g-2 mt-1">
                    <div class="col-4">
                        <div class="p-3 " style="width: 100%; overflow:hidden">
                            <img src="img/gow1.jpg" class="img-fluid" style="width: 100%;overflow:hidden; border-radius: 10px;" alt="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 " style="width: 100%; overflow:hidden">
                            <img src="img/gow1.jpg" class="img-fluid" style="width: 100%;overflow:hidden; border-radius: 10px;" alt="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 " style="width: 100%; overflow:hidden">
                            <img src="img/gow1.jpg" class="img-fluid" style="width: 100%;overflow:hidden; border-radius: 10px;" alt="">
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-7">
                <div style=" border-radius: 10px;background-color: rgba(25, 25, 25, 0.8);" class="p-3 m-3 ">
                    <h1><?= $row["nama"]; ?></h1>
                    <br>
                    <p>Kategori:</p>
                    <p><?= $row['kategori']; ?></p>
                    <br>
                    <p>deskripsi:</p>
                    <p><?= $row['deskripsi']; ?></p>
                    <br>
                    <!-- <s style="color: grey;">IDR 500000</s> -->
                    <h4>IDR <?= $row['harga']; ?></h4>
                    <span>
                        <a style="font-size: 25px;background-color: #23615F;color : white;padding : 5px 40px;" href="Transaksi.php?id=<?= $row['id']; ?>" class="btn  " role="button" aria-disabled="true">Checkout</a>

                    </span>
                </div>
            </div>
        </div>
        <br>
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