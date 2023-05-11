<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MS Dentals</title>
  <link href="style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


  <!-- <link rel="stylesheet" type="text/css" href="css/Bootstrap.css">
  <link rel="stylesheet" type="text/css" href="js/Bootstrap.js">
  <link rel="stylesheet" href="appointStyle.css"> -->




  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>

<body>
  <?php

  $conn = new mysqli('localhost', 'root', '', 'msdental');
  if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
  }
  include 'header.php';





  $ser = "select S_id,name from services ";
  $q1 = mysqli_query($conn, $ser);

  $docs = "select D_id,name from doctor";
  $q2= mysqli_query($conn, $docs);

  if (isset($_POST['submitForm'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $prob = mysqli_real_escape_string($conn, $_POST['problem']);
    $doc = mysqli_real_escape_string($conn, $_POST['doctors']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['slot']);
    $service=mysqli_real_escape_string($conn, $_POST['serviceId']);
    $serviceId=(int)$service;
    $docId=(int)$doc;
    $emailcheck = " select * from registration where email='$email' ";
    $query = mysqli_query($conn, $emailcheck);
    $emailcount = mysqli_num_rows($query);
    // $_SESSION['checkFlag'] = false;
    
   

    if ($emailcount == 0 && $_SESSION['flag'] == false && $_SESSION['checkFlag']==false) {
      echo '<div class="alert alert-warning" role="alert">
      Please login or signup first!
    </div>';
    } 
  
    else {

      if($email==$_SESSION['lemail'] || $email==$_SESSION['semail'])
      {
      $r_id=" select r_id from registration where email='$email' ";
      $regId = mysqli_query($conn, $r_id);
          while ($row = mysqli_fetch_array($regId)) {
           $rId = $row['r_id'];
          }
          $regID=(int)$rId;
      $p_id=" select p_id from patient where r_id='$regID' ";
      $patId= mysqli_query($conn, $p_id);   
      while ($row2 = mysqli_fetch_array($patId)) {
        $pId = $row2['p_id'];
       }   
       $patID=(int)$pId;
      $timeCheck=" select * from appointment where timeslot='$time' and date='$date'";
      $checking=mysqli_query($conn, $timeCheck);
      $timecount = mysqli_num_rows($checking);
      if($timecount>0)
      {
        echo '<div class="alert alert-warning" role="alert">
        Select Another date or time
      </div>';
      }
      else{
      $insertquery = "insert into appointment(timeslot,date,s_id,p_id) values('$time','$date','$serviceId','$patID')";
      $updatequery="update patient set d_id='$docId' , problem='$prob' where r_id= '$regID' ";
      $iquery = mysqli_query($conn, $insertquery);
      $uquery=mysqli_query($conn, $updatequery);
      if($iquery && $uquery){
        echo '<div class="alert alert-success" role="alert">
        Appointment Booked!
      </div>';
      }
      else
      {
        echo '<div class="alert alert-danger" role="alert">
        Recorded not inserted!!
      </div>';
      }
    }
  }
else{
  echo '<div class="alert alert-warning" role="alert">
      Please book appointment with your id!!
    </div>';
}


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

    <div class="container">
      <div class="row">
        <div class="col-lg-7 align-items-center d-flex justify-content-center">
          <div class="card white border-0" style="width: 30rem;">
            <div class="card-body white border-0">

              <h1 class="card-title">Book Your Appointment</h1>
              <p class="card-text">You can book your appoinment here.We make sure to serve you as soon as
                possible.<br><b>To book your appointment please log in</b></p>
              <form class="form-inline my-2 my-lg-0">
                <!-- <a href="signup.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Sign up</button></a> -->
                <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Log in</button></a>
              </form>
            </div>
          </div>

        </div>


        <div class="col-md-5">
          <form class="mx-1 mx-md-4" method="POST">

            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Appointment From</p>
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
                <label class="form-label" for="textAreaExample">Your Problem</label>
                <textarea class="form-control" id="textAreaExample1" rows="4" name="problem"></textarea>
              </div>
            </div>

            <!-- <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-check-label" for="flexRadioDefault1">Gender</label><br>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
              </div>
            </div> -->
            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label for="doctor">Choose a Sevice : </label>
                <select name="serviceId" id="doctors">
                
                  <?php 
                           while ($r = mysqli_fetch_array($q1)) {
                    echo '<option value= "' . $r['S_id'] . '">' . $r['name'] . '</option>';
                            }
                  
                  ?>
                </select>
              </div>
            </div>

           
            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label for="doctor">Choose a Doctor : </label>
                <select name="doctors" id="doctors">
                  
                <?php 
                           while ($r2 = mysqli_fetch_array($q2)) {
                    echo '<option value= "' . $r2['D_id'] . '">Dr.' . $r2['name'] . '</option>';
                            }
                  
                  ?>
          
                </select>
              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label for="Date">Date : </label>
                <input type="date" id="Date" name="date">
              </div>
            </div>


            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label for="Slot">Select Slot : </label>
                <select name="slot" id="slot">
                  <option value="9:00-9:30am">9:00-9:30 am</option>
                  <option value="10:00-10:30am">10:00-10:30 am</option>
                  <option value="11:00-11:30am">11:00-11:30 am</option>
                  <option value="12:00-12:30pm">12:00-12:30 pm</option>
                  <option value="5:00-5:30pm">5:00-5:30 pm</option>
                  <option value="6:00-6:30pm">6:00-6:30 pm</option>
                  <option value="7:00-7:30pm">7:00-7:30 pm</option>
                  <option value="8:00-8:30pm">8:00-8:30 pm</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 align-items-center d-flex justify-content-center">
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" name="submitForm" class="btn btn-primary btn-lg">Submit</button>
                </div>

              </div>
              <div class="col-lg-6 align-items-center d-flex justify-content-center">

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="reset" name="cancel" class="btn btn-primary btn-lg">Cancel</button>
                </div>

              </div>
            </div>

            


          </form>

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