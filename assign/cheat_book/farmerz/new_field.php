<?php
@session_start();
include "../inc/dbh.php";
$id=$_SESSION['f_id'];
// echo $id;
$query = "SELECT * FROM `farmer` WHERE  `farmer_id` = '$id'";
          $res = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($res);
          $name = $row['first_name'] ." ".$row['last_name'];
        //   echo "$name"; 
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    include"../back.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document
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
    </title>
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
        <form method="POST" action="editlanddetails.php">
            <div class="container">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label ">Farmer_id </label>
                    <div class="col-sm-10">
                        <input type="text" name="f_id" readonly="true" class="form-control" value="<?php echo $id; ?>" id="f_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_name" class="form-control" placeholder="Name" id="land_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Size </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_size" class="form-control" placeholder="Size" id="land_size">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Unit </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_unit" class="form-control" placeholder="Unit" id="land_unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Owner </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_own" class="form-control" placeholder="Owner" id="land_own">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label ">Land Sector </label>
                    <div class="col-sm-10">
                        <input type="text" name="land_sector" class="form-control" placeholder="Sector" id="land_sect">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="actegory" class="col-sm-2 col-form-label ">Category</label>
                    <div class="col-sm-10">
                        <input type="text" name="cat" class="form-control" placeholder="Category" id="category">
                    </div>
                </div>
            <div class="d-flex justify-content-around">
                <input class="btn btn-danger btn-lng"  type="submit" value="submit">
                <input class="btn btn-danger"  type="reset" value="Reset" onclick="location.href='new_field.php'">
            </div>
    </div>
    </div>
    </form>
    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
      </div>    
</body>

</html>