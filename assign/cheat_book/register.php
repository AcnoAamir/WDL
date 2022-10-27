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
            background-color: rgb(177, 255, 173);
            font-style: oblique;
            color: black;
            font-kerning: normal;
        }
    </style>
</head>

<body>
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
                <ul class="btn my-2 my-sm-0">
                    <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='login.php'">BACK</button>
                </ul>
            </div>
        </nav>
    </div>


    <div class="m">
        <center>
            <div class="card text-center" style="width: 45rem; vertical-align: top;">
                <div class="reg">
                    <div class="card-header">
                        Registration form
                    </div>
                    <div class="card-body">
                        <form method="POST" action="new.php">
                            <div class="form-group">
                                <label for="UserType">User Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option id="SELECT" value="-1">--SELECT--</option>
                                    <option id="Farmer" value="0">Farmer</option>
                                    <option id="Invester" value="1">Invester</option>
                                    <option id="Admin" value="2">Admin</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
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
                            <div class="form-group">
                                <label for="PersoanlInfo">Personal Info</label>
                            </div>
                            <div class="form-group row">
                                <label for="FirstName" class="col-sm-2 col-form-label"> First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" placeholder="First Name" id="f_name" name="f_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Last_name" class="col-sm-2 col-form-label"> Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" placeholder="Last Name" id="l_name" name="l_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Gender" class="col-sm-2 col-form-label"> Gender</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control-plaintext" placeholder="Gender" id="gender" name="gender">
                                </div>
                                <label for="Age" class="col-sm-2 col-form-label"> Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control-plaintext" placeholder="Age" id="age" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Phone" class="col-sm-2 col-form-label"> Phone number</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control-plaintext" placeholder="Phone number" id="phone" name="phone">
                                </div>
                                <label for="Phone" class="col-sm-2 col-form-label"> Alternate Number </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control-plaintext" placeholder="Alternate number" id="phone2" name="phone2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-2 col-form-label"> City/Village/Town</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control-plaintext" placeholder="City/Village/Town" id="city" name="city">
                                </div>
                                <label for="City" class="col-sm-2 col-form-label"> Pincode</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control-plaintext" placeholder="Pincode" id="pin" name="pin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="District" class="col-sm-2 col-form-label"> District</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control-plaintext" placeholder="District" id="dist" name="dist">
                                </div>
                                <label for="City" class="col-sm-2 col-form-label"> State </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control-plaintext" placeholder="State" id="state" name="state">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-2 col-form-label"> Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-plaintext" placeholder="OPEN/OBC/SC/SC" id="cat" name="cat">
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