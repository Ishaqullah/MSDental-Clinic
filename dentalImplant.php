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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                <h2>Dental Implants</h2>

            </div>
        </div>
    </section>



    <section class="poppins p20">



        <div class="row ">
            <div class="col-lg-6 align-items-center d-flex justify-content-center">
                <!-- <div style="height: 300px;width: 600px;box-shadow: inset 10px 10px 100px rgba(0,0,0,0.9);"> -->
                <img src="images/dentalImplant.png" width="500" height="300">
            </div>

            <div class="col-lg-6 align-items-center  justify-content-center">
                <h1>
                    We eliminate the inconvenience
                    of multiple visits</h1>
                <p>Types of bridges may vary, depending upon how they are fabricated and the way they anchor to the
                    adjacent teeth.
                    Types of bridges may vary, depending upon how they are fabricated and the way.</p>
                <p> They anchor to the adjacent teeth. Way they anchor to the adjacent teeth.
                    Types of bridges may vary, depending upon how they are fabricated and the way.</p>
                <br>

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
                        <button type="button" class="btn btn-light">Make appointment</button>

                    </div>
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