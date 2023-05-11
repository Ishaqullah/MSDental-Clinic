<section class="poppins">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">

      </div>

      <div class="col-lg-4 align-items-center d-flex justify-content-center">
        <img src="images/logo.jpg" alt="Bootstrap" width="100" height="100">
        <h1 class="header-title">Dental Clinic</h1>
      </div>
      <?php


      session_start();
      if (isset($_SESSION['Buttonflag']) && $_SESSION['Buttonflag']) {
        if (isset($_SESSION['flag']) && $_SESSION['flag']) {
          echo '<div class="col-lg-4 align-items-center d-flex justify-content-center">
            <div style="padding:10px;">Welcome  <b>' . $_SESSION['name'] . '</b></div><form method="POST" class="form-inline my-2 my-lg-0">
            <button type="submit" name="submit" class="btn btn-outline-dark my-2 my-sm-0" >Sign Out</button></a>
          </form>
        </div>';

        } elseif (isset($_SESSION['checkFlag']) && $_SESSION['checkFlag']) {
          echo '<div class="col-lg-4 align-items-center d-flex justify-content-center">
          <div style="padding:10px;">Welcome  <b>' . $_SESSION['Sname'] . '</b></div><form method="POST" class="form-inline my-2 my-lg-0">
          <button type="submit" name="submit" class="btn btn-outline-dark my-2 my-sm-0" >Sign Out</button></a>
        </form>
      </div>';
        }
      } else {
        echo '<div class="col-lg-4 align-items-center d-flex justify-content-center">
          <form class="form-inline my-2 my-lg-0">
            <a href="signup.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Sign up</button></a>
            <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0" role="button">Log in</button></a>
          </form>

        </div>';
      }

      if (isset($_POST['submit'])) {

        $_SESSION['checkFlag'] = false;
        $_SESSION['Buttonflag'] = false;
        $_SESSION['flag'] = false;
        header("Location:index.php");

      }
      ?>
    </div>
  </div>
</section>