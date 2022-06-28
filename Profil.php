<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location:index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet">
</head>

<body>
    <section class="vh-200 gradient-custom">
        <nav class="navbar navbar-expand ms-auto mb-2 mb-lg-0  sticky-top ">
            <a class="navbar-brand" href="index.php">Pentium</a>
            <div class="collapse navbar-collapse justify-content-end float-right" id="navbarNavAltMarkup">
                <div class="navbar-nav text-white">
                    <?php
                    if (isset($_SESSION['leveluser'])) {

                        if ($_SESSION['leveluser'] == 0) { ?>
                            <a style="color: white;" class="nav-link active" aria-current="page" href="index.php">Home</a>
                            <a style="color: white;" class="nav-link active" aria-current="page" href="library.php">Library</a>
                            <a style="color: white;" class="nav-link active" aria-current="page" href="profil.php"><?= $_SESSION['username']; ?></a>
                            <a style="color: white;" class="nav-link active gren" aria-current="page" href="logout.php">Log Out</a>
                        <?php
                        } else if ($_SESSION['leveluser'] == 1) { ?>
                            <a style="color: white;" class="nav-link active" aria-current="page" href="index.php">Home</a>
                            <a style="color: white;" class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                            <a style="color: white;" class="nav-link active gren" aria-current="page" href="logout.php">Log Out</a>
                        <?php
                        }
                    } else { ?>
                        <a style="color: white;" class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a style="color: white;" class="nav-link" href="SignIn.php">Sign In</a>
                        <a style="color: white;" class="nav-link gren" href="SignUp.php">Sign Up</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <style>
            .card {
                padding: 30px;
                margin: 10px 0px;
            }

            .gradient-custom {
                background-image: url(img/profil.jpg);
                background-size: cover;
                background-attachment: fixed;
                height: fit-content;
                width: auto;
            }
        </style>
        <div class="container mt-5">
            <?php

            include "koneksi.php";

            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $query = "SELECT * FROM user WHERE id = $id";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
            }


            ?>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card " style="border-radius: 1rem;background-color: rgba(25, 25, 25, 0.8);">
                        <img src="img/<?= $row["foto"]; ?>" style="border-radius: 1rem;width:100%">
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card  text-white" style="border-radius: 1rem;background-color: rgba(25, 25, 25, 0.8)">
                        <h1><?= $row["username"]; ?></h1>
                        <h3>Balance : IDR <?= $row["saldo"]; ?></h3>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                    <div class="card  text-white" style="border-radius: 1rem;background-color: rgba(25, 25, 25, 0.8);">
                        <h1>
                            My Games
                        </h1>
                        <div class="list-group" style="border-radius: 1rem;background-color: rgba(25, 25, 25, 0.8);">
                            <?php

                            $idUser = $_SESSION['id'];

                            $queryy = "SELECT * FROM library WHERE idUser = $idUser";
                            $resultt = mysqli_query($connect, $queryy);
                            if (mysqli_num_rows($resultt) > 0) {
                                while ($roww = mysqli_fetch_array($resultt)) {
                                    $idGame = $roww['idGame'];
                                    $queryyy = "SELECT * FROM game WHERE id = '$idGame'";
                                    $resulttt = mysqli_query($connect, $queryyy);
                                    $rowGame = mysqli_fetch_assoc($resulttt);
                            ?>
                                    <a href="#" style="background-color: rgba(31, 31, 31, 0.54);color : white;" class="list-group-item list-group-item-action "><?= $rowGame['nama']; ?></a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="card  text-white" style="border-radius: 1rem;background-color: rgba(25, 25, 25, 0.8);">
                        <form action="updateData.php" method="post">
                            <h1>My Account</h1>
                            <!-- row 1 -->
                            <div class="row">
                                <div class="col">
                                    <h2>Username</h2>
                                    <div class="form-outline form-white mb-4 ">
                                        <input type="username" name="username" id="Usernamex" class="form-control form-control-lg " value="<?= $row["username"]; ?>" placeholder="<?= $row["username"]; ?>" />
                                    </div>
                                </div>
                                <div class="col">
                                    <h2>Email</h2>
                                    <div class="form-outline form-white mb-4 ">
                                        <input type="email" name="email" id="Emailx" class="form-control form-control-lg " value="<?= $row["email"]; ?>" placeholder="<?= $row["email"]; ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- row 2 -->
                            <div class="row">
                                <div class="col">
                                    <h2>Address</h2>
                                    <div class="form-outline form-white mb-4 ">
                                        <input type="address" name="address" id="Addressx" class="form-control form-control-lg " value="<?= $row["address"]; ?>" placeholder="<?= $row["address"]; ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- row 3 -->
                            <div class="row">
                                <h2>Phone Number</h2>
                                <div class="col-12">
                                    <div class="form-outline form-white mb-4 ">
                                        <input type="phonenumber" name="phonenumber" id="PhoneNumberx" class="form-control form-control-lg " value="<?= $row["noHp"]; ?>" placeholder="<?= $row["noHp"]; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" name="submit" style="width:100%; background-color: #23615F;border-color: #23615F;" class="btn btn-outline-light btn-lg px-3" value="Save Profil">
                                </div>
                            </div>
                        </form>

                        <hr style="color : green">
                        <div class="row">
                            <div class="col-4">
                                <h2>Top Up Balance</h2>
                                <div class="form-outline form-white mb-4 ">
                                    <form action="tambahSaldo.php" method="POST">
                                        <input name="saldo" type="balance" id="balance" class="form-control form-control-lg " placeholder="Top Up Balance" />
                                </div>
                            </div>
                            <div class="col-5 justify-content-center align-items-center">
                                <br> <br>
                                <span>
                                    <img style="width: 85px;" src="img/dana.webp" alt="">
                                    <img style="width: 85px;" src="img/gopay.png" alt="">
                                    <img style="width: 85px;" src="img/ovo.png" alt="">
                                </span>
                            </div>
                            <div class="col-3">
                                <div class="mb-4">
                                    <br><br>
                                    <input name="submitt" type="submit" style="background-color: #23615F;border-color: #23615F;" class="form-control form-control-lg text-white" value="Top Up Now">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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