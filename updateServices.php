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

            $fetchQuery = "SELECT s_id,name,fees FROM services";
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
                            <th scope="col">Service Name</th>
                            <th scope="col">Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($res = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $res['s_id'] . "</th>";
                            echo "<td>" . $res['name'] . "</td>";
                            echo "<td>" . $res['fees'] . "</td>";
                        }
                        ?>
                    </tbody>

                </table>
                <form class="mx-1 mx-md-4" method="POST">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline  mb-0">
                            <label class="form-label" for="form3Example1c">Service Id You Want To Update</label>
                            <input type="number" id="form3Example1c" class="form-control" name="id" required />
                        </div>
                    </div>
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update Service</p>



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
                            <label class="form-label" for="form3Example3c">Fees</label>
                            <input type="number" id="form3Example3c" class="form-control" name="fees" required />
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" name="submit">Update service</button>

                    <?php
                    if (array_key_exists('submit', $_POST)) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $fees = $_POST['fees'];
                        $updateId = "update services set name='$name' , fees='$fees' where s_id='$id' ";
                        if ($conn->query($updateId) === TRUE) {
                            echo "<label class='form-label' for='form3Example1c'>Services Updated Successfully</label>";
                        } else if ($conn->query($deleteId) === FALSE) {
                            echo "Error updating record: " . $conn->error;
                        }



                    }
                    ?>

                </form>






            </div>





        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="script.js"></script>
</body>

</html>