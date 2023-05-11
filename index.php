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
  $conn = new mysqli('localhost', 'root', '', 'msdental');
  if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
  }
  include 'header.php';
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

  <section>


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <video class="img-fluid" autoplay loop muted>
            <source src="videos/video3.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="carousel-item">
          <video class="img-fluid" autoplay loop muted>
            <source src="videos/video2.mp4" type="video/mp4" />
        </div>
        <div class="carousel-item">
          <video class="img-fluid" autoplay loop muted>
            <source src="videos/video1.mp4" type="video/mp4" />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 align-items-center d-flex justify-content-center blue text-white">
          <img src="images/2.png" width="50" height="50">
          <div class="card blue border-0" style="width: 18rem;">
            <div class="card-body blue border-0">

              <h5 class="card-title">Tooth Protection</h5>
              <p class="card-text">There are only 2 dental specialties that only focus on dental esthetics:
                Prosthodontics and Orthodontics</p>

            </div>
          </div>

        </div>
        <div class="col-lg-4 align-items-center d-flex justify-content-center green text-white">
          <img src="images/1.png" width="50" height="50">
          <div class="card green border-0" style="width: 18rem;">
            <div class="card-body green border-0">
              <h5 class="card-title">Teeth Whitening</h5>
              <p class="card-text">Bleaching methods use carbamide peroxide which reacts with water to form hydrogen
                peroxide loremis</p>

            </div>
          </div>

        </div>
        <div class="col-lg-4 align-items-center d-flex justify-content-center grey text-white">
          <img src="images/3.png" width="50" height="50">
          <div class="card grey border-0" style="width: 18rem;">
            <div class="card-body grey border-0">
              <h5 class="card-title">Cosmetic Dentistry</h5>
              <p class="card-text">There are only 2 dental specialties that only focus on dental esthetics:
                Prosthodontics and Orthodontics</p>

            </div>
          </div>

        </div>
      </div>
    </div>











  </section>




  <section class="poppins">

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center">
          <h1>Welcome to MS Dental Clinic</h1>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center">
          <h5>Highest level of service you can find</h5>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-lg-6">
        <!-- <div style="height: 300px;width: 600px;box-shadow: inset 10px 10px 100px rgba(0,0,0,0.9);"> -->
        <img src="images/Screenshot_1.png" width="600" height="400">
      </div>

      <div class="col-lg-6" style="padding-top:150px;">
        <p>Our focus is on your overall well being and helping you achieve<br> optimal health
          and esthetics. We provide state-of-the-art <br>dental care in a comfortable.</p>
        <br><br>
        <a href="aboutUs.php"><button type="button" class="btn btn-primary">More About Us</button></a>
      </div>
    </div>


  </section>


  <br>


  <section class="poppins">

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center">
          <h1>Our Clinic Services</h1>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12 align-items-center d-flex justify-content-center">
          <h5>Services we provide</h5>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/Screenshot 2022-11-08 015718.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Tooth Protection</h5>
              <p class="card-text">There are only 2 dental specialties that only focus on dental esthetics:
                Prosthodontics and Orthodontics</p>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/4.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Dental Implants</h5>
              <p class="card-text">The implant fixture is first placed, so that it is likely to osseointegrate, then a
                dental prosthetic is added</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/5.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Dental Care</h5>
              <p class="card-text">We provide a wide range of oral health care services to patients, from routine
                checkups to fitting braces</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/6.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Teeth Whitening</h5>
              <p class="card-text">Bleaching methods use carbamide peroxide which reacts with water to form hydrogen
                peroxide loremis</p>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/9.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Dental Calculus</h5>
              <p class="card-text">Types of bridges may vary, depending upon how they are fabricated and the way they
                anchor to the adjacent teeth</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 18rem;">
          <div class="text-center"> <img src="images/8.png" width="90" height="90">
            <div class="card-body white border-0">
              <h5 class="card-title">Prevention</h5>
              <p class="card-text">The most important part of preventive dentistry is to brush teeth with fluoride
                toothpaste approved by ADA</p>
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
        <div class="card white border-0" style="width: 35rem;">
          <h2>We eliminate the inconvenience <br>of multiple visits</h2>

          <div class="card-body white border-0">
            <img src="images/10.png" width="15" height="15">No second injections or temporaries<br><br>
            <img src="images/10.png" width="15" height="15">No unprofessional doctors<br><br>
            <img src="images/10.png" width="15" height="15">No poor quality products<br><br>
            <a href="aboutUs.php"><button type="button" class="btn btn-success">More About Us</button></a>
          </div>

        </div>
      </div>

      <div class="col-lg-6 align-items-center d-flex justify-content-center">
        <img src="images/bigstock-healthcare-medical-and-radiol-122855501-e1490367316684.jpg">
      </div>


    </div>




  </section>
  <br>

  <section class="poppins">

    <div class="row">
      <div class="col-lg-12 align-items-center d-flex justify-content-center text-white">
        <div class="card grey border-0 text-center" style="width: 100%; height: 10rem;">
          <div class="card-body blue border-0">
            <h2>High Innovative Technology & Professional Dentists</h2><br><br>
            <a href="appointment.php"> <button type="button" class="btn btn-light">Make appointment</button></a>

          </div>
        </div>
      </div>
    </div>




  </section>


  <br>

  <section class="poppins">


    <div class="row">

      <div class="col-lg-6 align-items-center d-flex justify-content-center">
        <video class="w-100" autoplay loop muted>
          <source src="videos/very_slim_beautiful_nurse.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="col-lg-6 align-items-center d-flex justify-content-center">
        <div class="card white border-0" style="width: 35rem;">
          <h2>Your comfort is our priority</h2>

          <div class="card-body white border-0">
            <p>Dentures actually improve our smiles and overall apperance. Not only they
              make us look better, but also make our life easier. Enjoy simple things as food,
              conversation and smile. Forget about uncomfortable social encounters.</p>
            <a href="aboutUs.php"><button type="button" class="btn btn-success">More Information</button></a>
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
          <h2>Contact Us</h2>
          <h5>Don't hesitate to contact us!</h5>
          <br><br>
          <a href="contact.php"><button type="button" class="btn btn-primary">Contact us</button></a>
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