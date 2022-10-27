<html lang="en">
<?php
@session_start();
include '../back.php';
if (isset($_SESSION['username']) == FALSE) {
  echo '<script language="javascript"> alert("LOGIN AGAIN.."); </script>';
  sleep(3);
  session_unset();
  session_destroy();
  header('Location:../login.php');
} else
  $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Farmer Home Page</title>
</head>

<body>
  <!-- h1 -->
  <div class="h">
    <form>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="..\logo1.png" alt="Logo" style="width:50px"></a>
        <a class="navbar-brand" href="#">WELCOME&nbsp;&nbsp;
          <?php include '../inc/dbh.php';
          $query = "SELECT * FROM `farmer` WHERE  username = '$username'";
          $res = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($res);
          $f_name = $row['first_name'];
          $l_name = $row['last_name'];
          echo "$f_name $l_name"; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">New Application</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#existing" role="tab" aria-controls="profile" aria-selected="false">Existing Applications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">View Details</a>
            </li>
          </ul>
        </div>
        <form class="form-inline">
        <input class="btn btn-outline-danger my-2 my-sm-0" type="refresh" onclick="location.href='logout.php'"value="Logout">  </form>
        </form>
      </nav>

      <!-- </div>


  <div class="m"> -->

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <?php
          include 'empty.php'
          ?>
        </div>
        <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
          <?php
          include 'new.php';
          ?>
        </div>
        <div class="tab-pane fade" id="existing" role="tabpanel" aria-labelledby="profile-tab">
          <?php
          include 'existing.php';
          ?>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
          <?php
          include 'view.php';
          ?>

        </div>

      </div>
</div>
      <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
      </div>

</body>