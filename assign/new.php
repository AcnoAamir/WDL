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
    <title>Registration Page</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="  favicon.ico" />
    <style>
        .reg {
            /* background-color: rgb(177, 255, 173); */
            font-style: oblique;
            color: black;
            font-kerning: normal;
        }
    </style>
</head>

<body>
    <div class="h">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <h6>Welcome to new users </h6>
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
                <ul class="btn my-2 my-sm-0">
                    <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='index.php'">BACK</button>
                </ul>
            </div>
        </nav>
    </div>


    <div class="m">
        <center>
            <div class="card text-center" style="width: 45rem; vertical-align: top;">
                <div class="reg">
                    <div class="card-header">
                        <h5> Registration form </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="new1.php">
                            <div class="form-group">
                                <label for="UserType">User Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option id="SELECT" value="-1">--SELECT--</option>
                                    <option id="Farmer" value="0">User</option>
                                    <option id="Admin" value="1">Admin</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" placeholder="Username" id="username" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control-plaintext" id="exampleInputPassword1" placeholder="Password" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Password1" class="col-sm-2 col-form-label">Re-enter Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control-plaintext" id="exampleInputPassword1" placeholder="Password" id="password2" name="password2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label"> Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" placeholder="Name" id="name" name="name">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>



    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>


</body>

</html>