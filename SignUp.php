<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet">
</head>

<body>
  <style>
    .gradient-custom {
      background-image: url(img/bg.jpg);
      background-size: cover;
      background-attachment: fixed;
      height: fit-content;
      width: auto;
    }
  </style>
  <section class="vh-200 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card  text-white" style="border-radius: 10px;background-color: rgba(25, 25, 25, 0.8);">
            <div class="card-body p-5 text-center">

              <div class="">

                <h2 class="fw-bold mb-2 text-uppercase">PENTIUM</h2>
                <p class="text-white-50 mb-5">Sign up with a Pentium Account!</p>
                <form action="registerProses.php" method="POST">
                  <div class="form-outline form-white mb-4">
                    <input type="username" name="username" id="Usernamex" class="form-control form-control-lg" placeholder="Username" required />
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="email" name="email" id="Emailx" class="form-control form-control-lg" placeholder="E-mail" required />
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="PasswordX" class="form-control form-control-lg" placeholder="Password" required />
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="adrress" name="address" id="Addressx" class="form-control form-control-lg" placeholder="Address" required />
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="phonenumber" name="phonenumber" id="PhoneNumberx" class="form-control form-control-lg" placeholder="Phone Number" required />
                  </div>


                  <input style="background-color: #23615F;border-color: #23615F;" class="btn btn-outline-light btn-lg px-5" type="submit" name="submit" value="Sign Up Now" />
                </form>
                <br><br>
                <a href="index.php" style="text-emphasis-color:red;" class="text-white-50 fw-bold">Back To Home</a>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>