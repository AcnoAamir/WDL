<?php
@session_start();
include '../back.php';
if (isset($_SESSION['username']) == FALSE) {
    echo '<script language="javascript"> alert("LOGIN AGAIN.."); </script>';
    sleep(3);
    session_unset();
    session_destroy();
    header('Location:../index.php');
} else
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
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
            <h6 class="navbar-brand" href="#">WELCOME&nbsp;&nbsp;<?php include '../db/connect.php';
                                                                    $query = "SELECT * FROM `admin_details` WHERE  username = '$username'";
                                                                    $res = mysqli_query($conn, $query);
                                                                    $row = mysqli_fetch_array($res);
                                                                    $name = $row['Name'];
                                                                    echo "$name"; ?></h6>
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
                <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='./homepage.php'">BACK</button>
            </ul>
        </nav>
    </div>


    <div class="m">
        <center>
            <div class="card text-center" style="width: 45rem; vertical-align: top;">
                <div class="reg">
                    <div class="card-header">
                        <h5> Change Password </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="change.php">
                            <?php echo '<div class="form-group row">
                                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control-plaintext" placeholder=',$username,' id="username" name="username" disabled>
                                </div>
                            </div>' ?>
                            <div class="form-group row">
                                <label for="Password" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control-plaintext" id="exampleInputPassword1" placeholder="Old Password" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Password1" class="col-sm-2 col-form-label">New  Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control-plaintext" id="exampleInputPassword1" placeholder=" New Password" id="password2" name="password2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Password" class="col-sm-2 col-form-label">Re-enter New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control-plaintext" id="exampleInputPassword1" placeholder="Re-enter new Password" id="password3" name="password3">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>



    <div class="f2">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>


</body>

</html>