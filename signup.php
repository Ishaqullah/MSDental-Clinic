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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $addr = mysqli_real_escape_string($conn, $_POST['address']);
    $pass = openssl_encrypt(
      $password,
      $ciphering,
      $encryption_key,
      $options,
      $encryption_iv
    );

    $emailcheck = " select * from registration where email='$email' ";
    $query = mysqli_query($conn, $emailcheck);
    $emailcount = mysqli_num_rows($query);

    $_SESSION['checkFlag'] = false;
    $_SESSION['semail'] = $email;

    if ($emailcount > 0) {
      echo "<script>alert('Account already eixst!');</script>";
    } else {
      if ($password === $cpassword) {
        $insertquery = "insert into registration(name,email,password,phone,address) values('$name','$email','$pass','$phone','$addr')";
        $iquery = mysqli_query($conn, $insertquery);
        $user = " select name from registration where email='$email'";
        $query2 = mysqli_query($conn, $user);
        while ($row = mysqli_fetch_array($query2)) {
          $_SESSION['Sname'] = $row['name'];
        }
        if ($iquery) {
          // $_SESSION['flag'] = true;
          $_SESSION['checkFlag'] = true;
          $_SESSION['Buttonflag'] = true;
          header("Location:index.php");

        } else {
          $_SESSION['checkFlag'] = false;
          echo "<script>alert('Error!');</script>";
        }
      } else {
        echo "<script>alert('Passwords are not matching');</script>";
      }
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

  <section style="background-color: #eee;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Name</label>
                        <input type="text" id="form3Example1c" class="form-control" name="name" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Email</label>
                        <input type="email" id="form3Example3c" class="form-control" name="email" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" id="form3Example4c" class="form-control" name="password" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Confirm Password</label>
                        <input type="password" id="form3Example4cd" class="form-control" name="cpassword" required />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Phone</label>
                        <input type="text" id="form3Example4cd" class="form-control" name="phone" required />
                      </div>

                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Address</label>
                        <input type="text" id="form3Example4cd" class="form-control" name="address" required />
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                      <label class="form-check-label" for="form2Example3">
                        I agree to all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>





                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="images/draw1.webp" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
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