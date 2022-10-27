<?php
@session_start();
include "../inc/dbh.php";
// Get the url of the page
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$l_id = $params['option'];
// echo $l_id;
$q="SELECT `name`, `farmArea_size`, `farmArea_Unit`, `Ownership`, `Sector`, `category` FROM `farmer_landdetails` WHERE `land_id`= $l_id";
$res=mysqli_query($conn,$q);
$row=mysqli_fetch_array($res);
// echo"
$l_name = $row[0];
$size = $row[1];
$unit = $row[2];
$own = $row[3];
$sec = $row[4];
$cat = $row[5];
// ";

$id = $_SESSION['f_id'];
$q1 = "SELECT `first_name`, `last_name` FROM `farmer` WHERE `farmer_id`=$id";
$r = mysqli_query($conn, $q1);
$ro = mysqli_fetch_array($r);
$name = $ro[0] . " " . $ro[1];

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
  WELCOME&nbsp;&nbsp;<?php echo"$name"; ?>
 </a>
  <form class="form-inline">
  <input class="btn btn-outline-success my-2 my-sm-0" type="refresh" onclick="location.href='fields.php'" value="Back">
  &nbsp;&nbsp;
  <input class="btn btn-outline-danger my-2 my-sm-0" type="refresh" onclick="location.href='logout.php'"value="Logout">  </form>
    </div>

    <div class="responsive">
<div class="form">
        <form method="POST" action="editlanddetail.php">
            <div class="container">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label ">Farmer_id </label>
                    <div class="col-sm-10">
                        <input type="text" name="f_id" readonly="true" class="form-control" value="<?php echo $id; ?>" id="f_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label ">Land_id </label>
                    <div class="col-sm-10">
                        <input type="text" name="l_id" readonly="true" class="form-control" value="<?php echo $l_id; ?>" id="l_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_name" class="form-control" value="<?php echo $l_name; ?>" id="land_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Size </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_size" class="form-control" value="<?php echo $size; ?>" id="land_size">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Unit </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_unit" class="form-control" value="<?php echo $unit; ?>" id="land_unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Owner </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_own" class="form-control" value="<?php echo $own; ?>" id="land_own">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Sector </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_sector" class="form-control" value="<?php echo $sec; ?>" id="land_sect">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="actegory" class="col-sm-2 col-form-label ">Category</label>
                    <div class="col-sm-10">
                        <input type="text" name="cat" class="form-control" placeholder="<?php echo $cat; ?>" value="<?php echo $cat; ?>" id="category">
                    </div>
                </div>
            <div class="d-flex justify-content-around">
                <input class="btn btn-danger btn-lng"  type="submit" value="submit">
                <input class="btn btn-danger"  type="reset" value="Reset" onclick="location.href=$url">
            </div>
    </div>
    </div>
    </form>
    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
      </div>    
</body>

</html>