<?php
include 'back.php';
// session_start();
if (isset($_SESSION['username'])) {
  echo '<script language="javascript"> alert("LOGIN AGAIN.."); </script>';
  session_unset();
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- bootstrap js -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="favicon.ico" />
  <style>
    .admin {
      background-color: rgb(177, 255, 173);
      font-style: oblique;
      color: rgb(5, 89, 1);
      ;
      font-kerning: normal;
    }

    .other {
      font-variant: small-caps;
      font-kerning: normal;
      background-color: rgb(152, 250, 147);
      color: rgb(5, 89, 1);
      ;
    }

    .farmer {
      font-style: normal;
      background-color: rgb(126, 250, 120);
      color: rgb(5, 89, 1);
      font-kerning: normal;
    }
  </style>

</head>

<body>
  <!-- h1 -->
  <div class="h">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="https://en.wikipedia.org/wiki/Agriculture_in_India">
        <img src="logo1.png" alt="Logo" style="width:50px"></a>
      <h6>Welcome to our page-desu </h6>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <form class="form-inline my-2 my-lg-0 my-sm-0">
          <label for="Time " class="my-sm-0 my-lg-0">Time: <span id="datetime"></span></label>
        </form>
        <!-- Date/Time -->
        <script>
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
        </script>
      </div>
    </nav>
  </div>


  <div class="m">
    <center>
      <div class="card text-center" style="width: 24rem;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="farmer-tab" data-toggle="tab" href="#farmer" role="tab" aria-controls="farmer" aria-selected="true">Farmer</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Invester</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">New</a>
          </li>

        </ul>

        <div class="tab-content" id="myTabContent">
          <!-- Farmer Tab -->
          <div class="tab-pane fade show active" id="farmer" role="tabpanel" aria-labelledby="farmer-tab">
            <div class="farmer">
              <form method="POST" action="auth_f.php">
                <div class="form-group" >
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" id="name" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" id="password" name="password">
                </div>
                <center><button type="submit" class="btn btn-primary" onsubmit="location.href='auth_f.php'">Login</button></center>
              </form>
            </div>
          </div>

          <!-- Other Tab -->
          <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
            <div class="other">
              <form method="POST" action="auth_o.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" id="name" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" id="password" name="password">
                </div>
                <center><button type="submit" class="btn btn-primary" onsubmit="location.href='auth_o.php'">Login</button></center>
              </form>
            </div>
          </div>

          <!-- Admin Tab -->
          <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
            <div class="admin">
              <form method="POST" action="auth_a.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" id="name" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" id="password" name="password">
                </div>
                <center><button type="submit" class="btn btn-primary" onsubmit="location.href='auth_a.php'">Login</button></center>
              </form>
              <div>
              </div>
            </div>
          </div>
          <!-- NEW Tab -->
          <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
          <form action="register.php">
          <center><button type="submit" class="btn btn-success" >New Registration</button></center>
          </div>
    </center>
  </div>


  <div class="f">
    <p align="center"> © All rights reserved to their respective owners </p>
  </div>

</body>

</html>