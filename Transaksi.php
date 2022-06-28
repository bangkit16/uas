<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location:index.php");
}

include "koneksi.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $rowUser = mysqli_fetch_assoc($result);
    $idGame = $_GET['id'];

    $queryy = "SELECT * FROM game WHERE id = $idGame";
    $resultt = mysqli_query($connect, $queryy);
    $rowGame = mysqli_fetch_assoc($resultt);
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet">
</head>

<body>
    <section class="vh-200 gradient-custom text-white">
        <style>
            .gradient-custom {
                background-image: url(img/transaksi.jpg);
                background-size: cover;
                height: fit-content;
                background-attachment: fixed;
                width: auto;
            }

            .container {
                padding: 50px;
            }

            .card {
                padding: 10px;
                margin: 10px 0px;
            }
        </style>
        <nav class="navbar navbar-expand ms-auto mb-2 mb-lg-0  sticky-top ">
            <a class="navbar-brand" href="index.php">Pentium</a>
            <div class="collapse navbar-collapse justify-content-end float-right" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php
                    if (isset($_SESSION['leveluser'])) {

                        if ($_SESSION['leveluser'] == 0) { ?>
                            <a class="nav-link active" style="color: white;" aria-current="page" href="index.php">Home</a>
                            <a class="nav-link active" style="color: white;" aria-current="page" href="library.php">Library</a>
                            <a class="nav-link active" style="color: white;" aria-current="page" href="profil.php"><?= $_SESSION['username']; ?></a>
                            <a class="nav-link active gren" style="color: white;" aria-current="page" href="logout.php">Log Out</a>
                        <?php
                        } else if ($_SESSION['leveluser'] == 1) { ?>
                            <a class="nav-link active" style="color: white;" aria-current="page" href="index.php">Home</a>
                            <a class="nav-link active" style="color: white;" aria-current="page" href="admin.php">Admin</a>
                            <a class="nav-link active gren" style="color: white;" aria-current="page" href="logout.php">Log Out</a>
                        <?php
                        }
                    } else { ?>
                        <a class="nav-link active" style="color: white;" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" style="color: white;" href="SignIn.php">Sign In</a>
                        <a class="nav-link gren" style="color: white;" href="SignUp.php">Sign Up</a>
                    <?php } ?>
                </div>
            </div>
        </nav>

        <div class="container mt-5" style="border-radius: 2rem;background-color: rgba(25, 25, 25, 0.8); ">
            <h1>Transaksi</h1>
            <div class="row">
                <div class="col sm-4">
                    <div class="card bg-transparent" style="border-radius: 1rem; border:none;">
                        <h1><?= $rowGame['nama']; ?></h1>
                        <img src="img/<?= $rowGame['gambarCover']; ?>" style="border-radius: 1rem;" width=300px>
                    </div>
                </div>

                <div class="col sm">
                    <div class="card bg-transparent text-white" style="border-radius: 1rem; border:none;">
                        <h1>Account <?= $_SESSION['username']; ?></h1>
                        <h2>Details Purchase</h2>
                        <br>
                        <h4>Name Game &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <?= $rowGame['nama']; ?></h4>
                        <h4>Price &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : IDR <?= $rowGame['harga']; ?>.-</h4>
                        <h4>Balance &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : IDR <?= $rowUser['saldo']; ?>.-</h4>
                        <h4>Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : IDR <?= $rowGame['harga']; ?>.-</h4>
                        <br><br><br><br><br>
                        <form action="checkout.php" method="post">
                            <input type="hidden" value="<?= $rowGame['id']; ?>" name="idGame">
                            <input type="hidden" value="<?= $rowUser['id']; ?>" name="idUser">
                            <input name="submit" type="submit" style="background-color: #23615F;border-color: #23615F;" class="btn btn-outline-light btn-lg px-3" value="Purchase Now" onclick="myFunction()">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script type=" text/javascript">
            function myFunction() {
                let text = "Press a button!\n OK or Cancel.";
                if (confirm(text) == true) {
                    window.location.replace("index.php");
                } else {
                    window.location.replace("Transaksi.php?id=");
                }
                document.getElementById("demo").innerHTML = text;
            }
        </script>


    </section>
    <div class="footer" style="height: 200px; padding : 20px">
        <div class="container justify-content-end ">
            <br>
            <p>Copyright 2022 Desain Pemrograman Web , Kelompok 4</p>
            <p>Bangkit Maulana Caniago (2131710143)</p>
            <p>Rizqi Zamzam Jamil (2131710089)</p>
            <br>
        </div>
    </div>
</body>

</html>