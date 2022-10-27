<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include '..\inc\dbh.php';
$id = $_SESSION['f_id'];
// echo $id;
$q = "SELECT `farmer_id`, `username`, `password`, `first_name`, `last_name`, `age`, `gender`, `category`, `qualification`, `state`, `district`, `block`, `village/town`, `pincode`, `mobile_no` FROM `farmer` WHERE farmer_id=$id;";
$t = mysqli_query($conn, $q);
$r = mysqli_fetch_array($t);

$username = $r['username'];
$cat = $r['category'];
$f_name = $r['first_name'];
$l_name = $r['last_name'];
$gender = $r['gender'];
$age = $r['age'];
$phone = $r['mobile_no'];
$city = $r['village/town'];
$state = $r['state'];
$dist = $r['district'];
$pin = $r['pincode'];
$qual = $r['qualification'];

// echo("
// username =  $username <br> 
// first name $f_name <br>
// last name $l_name <br>
// gender $gender <br>
// age $age <br>
// number $phone <br>
// city $city <br>
// state $state <br>
// dist $district <br>
// pin $pin <br>
// ");

include"../back.php";
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>...</title>

    <style>
        body {
            @media (min-width: 300px) {
                .container {
                    max-width: 300px;
                }
            }
        }

        .form {
            font-style: oblique;
            color: White;
        }
    </style>


</head>
<!-- style= "width:700px" -->

<body>
<div class="h">
      </nav>
      <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"><img src="..\logo1.png" alt="Logo" style="width:50px" class="d-inline-block align-top" loading="lazy">
  WELCOME&nbsp;&nbsp;<?php echo"$f_name $l_name"; ?>
 </a>
  <form class="form-inline">
  <input class="btn btn-outline-success my-2 my-sm-0" type="refresh" onclick="location.href='index_f.php'" value="Back">
  &nbsp;&nbsp;
  <input class="btn btn-outline-danger my-2 my-sm-0" type="refresh" onclick="location.href='logout.php'"value="Logout">  </form>
    </div>

    <div class="responsive">
<div class="form">
        <form method="POST" action="editdetail.php">
            <div class="container">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label ">Farmer_id </label>
                    <div class="col-sm-10">
                        <input type="text" name="id" readonly="true" class="form-control" value="<?php echo $id; ?>" id="f_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Username </label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" id="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label ">Password </label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="<?php echo $id; ?>" value="<?php echo $id; ?>" id="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">First Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="f_name" class="form-control" placeholder="<?php echo $f_name; ?>" value="<?php echo $f_name; ?>" id="f_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="l_name" class="col-sm-2 col-form-label ">Last Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="l_name" class="form-control" placeholder="<?php echo $l_name; ?>" value="<?php echo $l_name; ?>" id="l_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="age" class="col-sm-2 col-form-label ">Age </label>
                    <div class="col-sm-10">
                        <input type="text" name="age" class="form-control" placeholder="<?php echo $age; ?>" value="<?php echo $age; ?>" id="age">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label ">Gender </label>
                    <div class="col-sm-10">
                        <input type="text" name="gender" class="form-control" placeholder="<?php echo $gender; ?>" value="<?php echo $gender; ?>" id="gender">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="actegory" class="col-sm-2 col-form-label ">Category</label>
                    <div class="col-sm-10">
                        <input type="text" name="cat" class="form-control" placeholder="<?php echo $cat; ?>" value="<?php echo $cat; ?>" id="category">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qualification" class="col-sm-2 col-form-label ">Qualification</label>
                    <div class="col-sm-10">
                        <input type="text" name="qual" class="form-control" placeholder="<?php echo $qual; ?>" value="<?php echo $qual; ?>" id="qualification">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state" class="col-sm-2 col-form-label ">State</label>
                    <div class="col-sm-10">
                        <input type="text" name="state" class="form-control" placeholder="<?php echo $state; ?>" value="<?php echo $state; ?>" id="State">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="col-sm-2 col-form-label ">District</label>
                    <div class="col-sm-10">
                        <input type="text" name="dist" class="form-control" placeholder="<?php echo $dist; ?>" value="<?php echo $dist; ?>" id="District">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="City" class="col-sm-2 col-form-label ">Village/Town</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" placeholder="<?php echo $city; ?>" value="<?php echo $city; ?>" id="city">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pin" class="col-sm-2 col-form-label ">Pincode</label>
                    <div class="col-sm-10">
                        <input type="text" name="pin" class="form-control" placeholder="<?php echo $pin; ?>" value="<?php echo $pin; ?>" id="pin">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label ">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" placeholder="<?php echo $phone; ?>" value="<?php echo $phone; ?>" id="phone">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <input class="btn btn-danger btn-lng"  type="submit" value="submit">
                <input class="btn btn-danger"  type="reset" value="Reset" onclick="location.href='edit.php'">
            </div>
    </div>
    </div>
    </form>
    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
      </div>    
</body>

</html>