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



            $fetchQuery = "select * from doctor";
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
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Hours</th>
                            <th scope="col">Contact#</th>
                            <th scope="col">Speciality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($res = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $res['D_Id'] . "</th>";
                            echo "<td>" . $res['Name'] . "</td>";
                            echo "<td>" . $res['Email'] . "</td>";
                            echo "<td>" . $res['Address'] . "</td>";
                            echo "<td>" . $res['Hours'] . "</td>";
                            echo "<td>" . $res['Phone'] . "</td>";
                            echo "<td>" . $res['Speciality'] . "</td>";
                        }
                        ?>
                    </tbody>

                </table>




                <form class="mx-1 mx-md-4" method="POST">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline  mb-0">
                            <label class="form-label" for="form3Example1c">Id You Want To Update</label>
                            <input type="number" id="form3Example0c" class="form-control" name="id" required />
                        </div>
                    </div>


                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Doctor's Record</p>



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
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Speciality</label>
                            <input type="text" id="form3Example4c" class="form-control" name="speciality" required />
                        </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="textAreaExample">Hours: </label>
                            <select name="hours" id="slot">
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

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Address</label>
                            <input type="text" id="form3Example5c" class="form-control" name="address" required />
                        </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Contact</label>
                            <input type="text" id="form3Example6c" class="form-control" name="contact" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id='update-record' name="submit">Update
                        Record</button>

                    <?php
                    if (array_key_exists('submit', $_POST)) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $speciality = $_POST['speciality'];
                        $contact = $_POST['contact'];
                        $hours = $_POST['hours'];
                        $updateId = "update doctor set Name='$name', Email='$email', Phone='$contact', Address='$address' , Speciality='$speciality', Hours='$hours' where D_Id='$id' ";
                        if ($conn->query($updateId) === TRUE) {
                            echo "<label class='form-label' for='form3Example1c'>Record Updated Successfully</label>";
                        } else if ($conn->query($updateId) === FALSE) {
                            echo "Error updating record: " . $conn->error;
                        }



                    }
                    ?>


            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="script.js"></script>
</body>

</html>