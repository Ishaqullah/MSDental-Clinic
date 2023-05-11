<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'msdental');
if ($conn->connect_error) {
    die('Connect Failed : ' . $conn->connect_error);
}
if (isset($_POST['submitSignOut'])) {
    $_SESSION['adminFlag'] = false;
    header("Location:admin.php");
}
if ($_SESSION['adminFlag'] == false) {
    header("Location:admin.php");
}

?>
<div class="col-lg-2 bg-dark">
    <div class="sticky-md-top">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">Menu</span>
            </a>
            <ul class="nav nav-pills  flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link text-white align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li> -->
                <li>
                    <a href="#" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>

                </li>

                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle ">
                        <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Patients</span></a>
                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="updateRecords.php" class="nav-link text-white text-white px-0"> <span
                                    class="d-none d-sm-inline">Update Patient record</a>
                        </li>
                        <li>
                            <a href="deletePatientRec.php" class="nav-link text-white text-white px-0"> <span
                                    class="d-none d-sm-inline">Delete Patient Record</a>
                        </li>
                        <li>
                            <a href="patientRec.php" class="nav-link text-white text-white px-0"> <span
                                    class="d-none d-sm-inline">Fetch Patient Record</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Doctors</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        <li>
                            <a href="fetchDoc.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">Fetch Doctors record</a>
                        </li>
                        <li class="w-100">
                            <a href="addDoc.php" class="nav-link text-white px-0"> <span class="d-none d-sm-inline">Add
                                    Doctors record</a>
                        </li>
                        <li>
                            <a href="deleteDoc.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">Delete Doctors record</a>
                        </li>
                        <li>
                            <a href="updateDoc.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">Update Doctors record</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Appointments</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                        <li>
                            <a href="showAppointment.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">Show Appointments</a>
                        </li>
                        <li class="w-100">
                            <a href="appointmentDone.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">
                                    Appointments Done</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="medicalHistory.php" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Show Medical History</span>
                    </a>
                </li>

                <li>
                    <a href="revenue.php" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Show Revenue</span> </a>
                </li>

                <li>
                    <a href="#submenu5" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Services</span> </a>
                    <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                        <li>
                            <a href="addServices.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">Add Services</a>
                        </li>
                        <li class="w-100">
                            <a href="updateServices.php" class="nav-link text-white px-0"> <span
                                    class="d-none d-sm-inline">
                                    Update Services</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <hr>
            <div class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="images/drprof.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">Dr.
                        <?php echo $_SESSION['docname']; ?>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST"><button class="btn text-white" type="submit" name="submitSignOut">Sign
                                out</button></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>