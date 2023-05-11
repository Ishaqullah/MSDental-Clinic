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
<style>
  #feedback-form-wrapper #floating-icon>button {
    position: fixed;
    right: 0;
    top: 50%;
    transform: rotate(-90deg) translate(50%, -50%);
    transform-origin: right;
  }

  #feedback-form-wrapper .rating-input-wrapper input[type="radio"] {
    display: none;
  }

  #feedback-form-wrapper .rating-input-wrapper input[type="radio"]~span {
    cursor: pointer;
  }

  #feedback-form-wrapper .rating-input-wrapper input[type="radio"]:checked~span {
    background-color: #4261dc;
    color: #fff;
  }

  #feedback-form-wrapper .rating-labels>label {
    font-size: 14px;
    color: #777;
  }
</style>

<body>

  <?php

  $conn = new mysqli('localhost', 'root', '', 'msdental');
  if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
  }
  include 'header.php';



  if (isset($_POST['submitReview'])) {

    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if ($_SESSION['flag'] || $_SESSION['checkFlag']) {



      if ($email == $_SESSION['lemail'] || $email == $_SESSION['semail']) {
        $emailcheck = " select * from registration where email='$email' ";
        $query = mysqli_query($conn, $emailcheck);
        $emailcount = mysqli_num_rows($query);


        if ($emailcount > 0) {
          $id = "select P_id from patient p,registration r where r.email='$email' and p.r_id=r.r_id";
          $query1 = mysqli_query($conn, $id);
          while ($res = mysqli_fetch_array($query1)) {
            $pid = $res['P_id'];
          }

          $query2 = mysqli_query($conn, "insert into review(P_id,Review) value ('$pid','$review')");
          if ($query2) {
            echo '<div class="alert alert-success" role="alert">
                Thanks for your review; 
              </div>';
          } else {
            echo '<div class="alert alert-danger" role="alert">
                Some error occured; 
              </div>';
          }
        } else {
          echo '<div class="alert alert-danger" role="alert">
        Enter Valid Email address; 
      </div>';
        }
      } else {
        echo '<div class="alert alert-warning" role="alert">
    Please make review with your id!
  </div>';
      }
    } else {
      echo '<div class="alert alert-warning" role="alert">
        Please log in or signup; 
      </div>';
    }


  }










  ?>




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









  <section class="poppins">
    <div class="row py-4" style=" background-color: rgb(246, 246, 246);">
      <div class="col-lg-3 align-items-center d-flex justify-content-center">
        <h2>Contact Us</h2>

      </div>
    </div>
  </section>



  <section class="poppins">

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center">
          <h2>How to find us</h2>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center grey-text">
          <h5>Adress and Direction</h5>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-lg-6">
        <!-- <div style="height: 300px;width: 600px;box-shadow: inset 10px 10px 100px rgba(0,0,0,0.9);"> -->
        <img src="images/Screenshot_1.png" width="600" height="400">
      </div>

      <div class="col-lg-6" style="padding-top:150px;">

        <div class="row">
          <div class="col-lg-1">
            <img src="images/marker.png" height="20px" width="20px">
          </div>
          <div class="col-lg-6"> <b>Our Adress</b><br>
            <p class="grey-text">Sector 5C-2,North Karachi,Karachi</p>
          </div>

        </div>
        <br>
        <div class="row">
          <div class="col-lg-1">
            <img src="images/mobile-notch.png" height="20px" width="20px">
          </div>
          <div class="col-lg-6"> <b>Phone</b><br>
            <p class="grey-text">03331354844</p>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-1">
            <img src="images/time-check.png" height="20px" width="20px">
          </div>
          <div class="col-lg-6"> <b>Open Hours</b><br>
            <p class="grey-text">Mon-Sat 5:00pm-11:50pm</p>
          </div>
        </div>
        <br>




        <!-- Button trigger modal -->
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Contact Us
          </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-body">
                <form>
                  <div class="mb-3 mt-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="patName">
                  </div>
                  <div class="mb-3 mt-4">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                  </div>
                  <div class="mb-3 mt-4">
                    <label class="form-label">Message</label>
                    <input type="text" class="form-control" name="message">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>


  <section class="poppins">
    <div id="feedback-form-wrapper">
      <div id="floating-icon">
        <button type="button" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal"
          data-bs-target="#exampleModal">
          Feedback
        </button>

      </div>
      <div id="feedback-form-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
              </div>
              <form method="POST">
                <div class="modal-body">

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">How likely you would like to recommand us to your
                      friends?</label>
                    <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">1</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">2</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">3</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">4</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">5</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">6</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">7</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">8</span></label>
                      <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">9</span></label>
                      <label><input type="radio" name="rating" /><span
                          class="border rounded px-3 py-2">10</span></label>
                    </div>
                    <div class="rating-labels d-flex justify-content-between mt-1">
                      <label>Very unlikely</label>
                      <label>Very likely</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="input-one">Your email</label>
                    <input type="email" class="form-control" name="email" id="input-one" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="input-two">Would you like to say something?</label>
                    <textarea class="form-control" id="input-two" name="review" rows="3"></textarea>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submitReview">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>
  <section class="poppins">


    <div class="row">


      <div class="col-lg-6 align-items-center d-flex justify-content-center">
        <div class="card white border-0 text-center" style="width: 35rem;">
          <h2>Our Address</h2>
          <h5>Don't hesitate to visit us!</h5>

        </div>

      </div>


      <div class="col-lg-6 align-items-center d-flex justify-content-center">
        <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0"
            marginwidth="0"
            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=MS dental physician and physiotherapy center, Sector 5c/4 Sector 5 C 4 New Karachi Town, Karachi Search Google Maps&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
          <a href="https://formatjson.org/">format json</a>
        </div>
      </div>


    </div>




  </section>

  <br>

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