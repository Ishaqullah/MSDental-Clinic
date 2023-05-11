<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MS Dentals</title>
    <link href="adminStyle.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>

<body>


    <div class="container-fluid">

        <div class="row flex-nowrap">
            <?php
            include 'adminSideNav.php';

            $fetchQuery = "SELECT r.name as 'Patient Name' , d.name as 'Doctor Name',p.Problem as 'Patient Problem', s.name as 'Services',app.Date from medicalhistory m inner join patient p on p.P_id=m.P_id  inner join registration r on r.R_Id=p.R_Id inner join doctor d on m.D_id=d.D_id inner join services s on m.S_id=s.S_ID inner JOIN appointment app on  m.A_id=app.A_Id";
            $result = mysqli_query($conn, $fetchQuery);


            ?>



            <div class="col py-3">
                <div class="row">
                    <div class="col-lg-12 text-black">

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
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Problem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($res = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $res['Patient Name'] . "</td>";
                            echo "<td>" . $res['Doctor Name'] . "</td>";
                            echo "<td>" . $res['Services'] . "</td>";
                            echo "<td>" . $res['Date'] . "</td>";
                            echo "<td>" . $res['Patient Problem'] . "</td>";
                        }
                        ?>
                    </tbody>

                </table>


            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="script.js"></script>
</body>

</html>