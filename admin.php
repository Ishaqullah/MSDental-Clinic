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
  <!-- <section >
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">

            </div>

            <div class="col-lg-4 align-items-center d-flex justify-content-center">
                <img src="images/logo.jpg" alt="Bootstrap" width="100" height="100">
                <h1 class="header-title">Dental Clinic</h1>
            </div>
            
        </div>
    </div>
</section> -->

  <?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', 'msdental');
  if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
  }
  if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);




    $emailcheck = " select d_id from doctor where email='$email' and password='$password'";
    $user = " select name from doctor where email='$email'";
    $query1 = mysqli_query($conn, $emailcheck);
    $emailcount = mysqli_num_rows($query1);
    $query2 = mysqli_query($conn, $user);
    while ($row = mysqli_fetch_array($query2)) {
      $_SESSION['docname'] = $row['name'];
    }

    if ($emailcount > 0) {
      $_SESSION['adminFlag'] = true;
      header("Location:dashboard.php");

    } else {

      echo "<script>alert('Invalid Email Or Password');</script>";

      $_SESSION['adminFlag'] = false;
    }


  }

  ?>

  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">

          <div class="px-5 ms-xl-4 align-items-center d-flex justify-content-center">
            <!-- <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i> -->
            <div class="row">
              <div class="col-lg-12 align-items-center d-flex justify-content-center">
                <img src="images/logo.jpg" alt="Bootstrap" width="100" height="100">
              </div>
              <div class="col-lg-12 align-items-center d-flex justify-content-center">
                <h1 class="poppins">Admin Panel</h1>
              </div>
            </div>

          </div>

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form style="width: 23rem;" method="POST">

              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

              <div class="form-outline mb-4">
                <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="form2Example18">Email address</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form2Example28" class="form-control form-control-lg" name="password" />
                <label class="form-label" for="form2Example28">Password</label>
              </div>


              <div class="d-grid gap-2">
                <button class="btn btn-info btn-lg btn-block" id='login' type="submit" name="submit">Login</button>
              </div>
              <!-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p> -->

            </form>

          </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="images/admin.webp" alt="Login image" class="w-100 vh-100"
            style="object-fit: cover; object-position: left;">
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
  <script src="script.js"></script>
</body>

</html>