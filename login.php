<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MS Dentals</title>
  <link href="style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  session_start();
  include 'passwordEncyption.php';

  $conn = new mysqli('localhost', 'root', '', 'msdental');
  if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
  }
  if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $pass = openssl_encrypt(
      $password,
      $ciphering,
      $encryption_key,
      $options,
      $encryption_iv
    );


    $emailcheck = " select r_id from registration where email='$email' and password='$pass'";

    $query1 = mysqli_query($conn, $emailcheck);
    $emailcount = mysqli_num_rows($query1);
    $user = " select name from registration where email='$email'";
    $query2 = mysqli_query($conn, $user);
    while ($row = mysqli_fetch_array($query2)) {
      $_SESSION['name'] = $row['name'];
    }
    $_SESSION['lemail'] = $email;
    if ($emailcount == 1) {
      $_SESSION['flag'] = true;
      $_SESSION['Buttonflag'] = true;
      header("Location:index.php");


    } else {

      echo "<script>alert('Invalid Email Or Password');</script>";
      $_SESSION['flag'] = false;
    }


  }

  ?>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">

        </div>

        <div class="col-lg-4 align-items-center d-flex justify-content-center">
          <img src="images/logo.jpg" alt="Bootstrap" width="100" height="100">
          <h1 class="header-title">Dental Clinic</h1>
        </div>

        <div class="col-lg-4 align-items-center d-flex justify-content-center">
          <form class="form-inline my-2 my-lg-0">
            <a href="signup.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Sign up</button></a>
            <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Log in</button></a>
          </form>

        </div>
      </div>
    </div>
  </section>


  <section class="title">
    <div class="container-fluid">

      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark py-4">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-bg-dark" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="toothProtection.php">Tooth Protection</a></li>
                <li><a class="dropdown-item" href="dentalImplant.php">Dental Implants</a></li>
                <li><a class="dropdown-item" href="DentalCare.php">Dental Care</a></li>
                <li><a class="dropdown-item" href="theetWhite.php">Teeth Whitening</a></li>
                <li><a class="dropdown-item" href="dentalCalculus.php">Dental Calculus</a></li>
                <li><a class="dropdown-item" href="Prevention.php">Prevention</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="aboutUs.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="appointment.php">Appointment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact us</a>
            </li>
          </ul>

        </div>

      </nav>
    </div>
  </section>


  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
            alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="POST">


            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Enter a valid email address" required />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                placeholder="Enter password" required />
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" name="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                  class="link-danger">Register</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>



  <section class="poppins">


    <footer class="bg-dark text-center text-white">
      <div class="container p-4">

        <section class="">
          <form action="">
            <div class="row d-flex justify-content-center">

              <div class="col-auto">
                <button type="submit" class="btn btn-outline-light mb-4">
                  Sign up for queries
                </button>
              </div>
            </div>
          </form>
        </section>

        <section class="mb-4">
          <p>
            <b>"We beautify your smile..."</b>
          </p>
        </section>

      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright: All rights are reserved!
      </div>
    </footer>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
  <script src="script.js"></script>
</body>

</html>