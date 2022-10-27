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
$password = $_SESSION['password'];
?>
<head>
  <title>Investor Home Page</title>
</head>
<body>
  <!-- h1 -->
  <div class="h">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">WELCOME&nbsp;&nbsp;<?php include '../inc/dbh.php';      $query = "SELECT * FROM `investor` WHERE  username = '$username'";      $res = mysqli_query($conn, $query);      $row = mysqli_fetch_array($res);      $f_name = $row['first_name'];      $l_name = $row['last_name'];      echo "$f_name $l_name";?></a>
 
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <!-- Keep the above tags for the spacing  -->
        <form class="form-inline my-2 my-lg-0 my-sm-0">
          <label for="Time " class="my-sm-0 my-lg-0">Time: <span id="datetime"></span></label>
        </form>

        <!-- Date/Time -->
        <script>
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
        </script>
        <ul class="btn my-2 my-sm-0">
          <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='logout.php'">LOGOUT</button>
        </ul>

      </div>
    </nav>
  </div>


  <div class="m"> </div>
  <div class="f">
    <p align="center"> © All rights reserved to their respective owners </p>
  </div>

</body>