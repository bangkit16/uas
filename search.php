<?php
session_start();
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
                height: fit-content;
                width: auto;
            }
        </style>

        <div class="container mt-5 bg-dark text-white">
            <?php
            $name = $_GET['search'];
            include "koneksi.php";

            $query = "SELECT * FROM game WHERE nama LIKE '%$name%'";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card bg-dark" style="border-radius: 1rem;">
                                <h1><?php echo $row["nama"]; ?></h1>
                                <img src="img/<?php echo $row["gambarCover"]; ?>" width="300px">
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <h3>Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row["id"]; ?></h3>
                                <h3>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row["nama"]; ?></h3>
                                <h3>Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row["kategori"]; ?></h3>
                                <h3>Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row["harga"]; ?></h3>
                                <h3 style='text-align:justify;'>Deskripsi &nbsp;&nbsp;&nbsp; : <?php echo $row["deskripsi"]; ?></h3>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }

            ?>
            </table>
        </div>
        <br>
        <div class="footer" style="height: 200px; padding : 20px">
            <div class="container justify-content-end ">
                <br>
                <p>Copyright 2022 Desain Pemrograman Web , Kelompok 4</p>
                <p>Bangkit Maulana Caniago (2131710143)</p>
                <p>Rizqi Zamzam Jamil (2131710089)</p>
                <br>
            </div>
        </div>
    </section>
</body>

</html>
<!-- <form action="search.php" method="get">
                        <p>Search:</p>
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search"/>
                            <input type="submit" style="background-color: #23615F;border-color: #23615F;" class="btn btn-outline-light btn-lg px-5" value="Search">
                    </form> -->