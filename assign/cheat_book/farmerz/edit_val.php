<?php
@session_start();
include "../inc/dbh.php";
// Get the url of the page
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$val = $params['option'];
$q = "SELECT  `investor_id`, `farmer_id`, `land_id`, `Crop_Name`, `duration (months)`, `start_date`, `Status` FROM `contract` WHERE `contract_id`=$val";
$result = mysqli_query($conn, $q);
$rows = mysqli_fetch_array($result);
$i_id = $rows[0];
$f_id = $rows[1];
$l_id = $rows[2];
$c_name = $rows[3];
$dur = $rows[4];
$date = $rows[5];
$status = $rows[6];

$q1 = "SELECT  `name` FROM `farmer_landdetails` WHERE `land_id`=$l_id";
$re = mysqli_query($conn, $q1);
$r = mysqli_fetch_array($re);
$l_name = $r[0];

$q2 = "SELECT `first_name`, `last_name` FROM `investor` WHERE `investor_id`=$i_id";
$res = mysqli_query($conn, $q2);
$ro = mysqli_fetch_array($res);
$i_name = $ro[0] . " " . $ro[1];

$q3 = "SELECT `first_name`, `last_name` FROM `farmer` WHERE `farmer_id`=$f_id";
$resu = mysqli_query($conn, $q3);
$row = mysqli_fetch_array($resu);
$f_name = $row[0] . " " . $row[1];

// echo"
// i_id = $i_id  Name - $i_name <br>
// f_id = $i_id  Name - $f_name <br>
// l_id = $i_id  Name - $l_name <br>
// crop name = $c_name<br>
// Duration = $dur<br>
// Date = $date<br>
// Status = $status<br>
// ";
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "../back.php";
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
            color: black;
            font-variant-caps: small-caps;
            background-color: wheat;
            width: 75pc;
            align-self: center;
        }
    </style>

<body>
<div class="h">
      </nav>
      <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"><img src="..\logo1.png" alt="Logo" style="width:50px" class="d-inline-block align-top" loading="lazy">
  WELCOME&nbsp;&nbsp;<?php echo"$f_name"; ?>
 </a>
  <form class="form-inline">
  <input class="btn btn-outline-success my-2 my-sm-0" type="refresh" onclick="location.href='index_f.php'" value="Back">
  &nbsp;&nbsp;
  <input class="btn btn-outline-danger my-2 my-sm-0" type="refresh" onclick="location.href='logout.php'"value="Logout">  </form>
    </div>
    <div class="m">
        <div class="responsive">
            <center>
                <div class="form">
                <form method="POST" action="editdetails.php">
                    <div class="container">
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label ">Contract_id </label>
                            <div class="col-sm-10">
                                <input type="text" name="c_id" readonly="true" class="form-control" value="<?php echo $val; ?>" id="c_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label ">Farmer_id </label>
                            <div class="col-sm-10">
                                <input type="text" name="f_id" readonly="true" class="form-control" value="<?php echo $f_id; ?>" id="f_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Farmer Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="f_name" readonly="true" class="form-control" placeholder="<?php echo $f_name; ?>" value="<?php echo $f_name; ?>" id="f_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Invester Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="i_name" readonly="true" class="form-control" placeholder="<?php echo $i_name; ?>" value="<?php echo $i_name; ?>" id="i_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Field Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="l_name" readonly="true" class="form-control" placeholder="<?php echo $l_name; ?>" value="<?php echo $l_name; ?>" id="l_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Name of crop</label>
                            <div class="col-sm-10">
                                <input type="text" name="crop" class="form-control" readonly='true' placeholder="<?php echo $c_name; ?>" value="<?php echo $c_name; ?>" id="crop">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Duaration (In Months)</label>
                            <div class="col-sm-10">
                                <input type="text" name="dur" class="form-control" placeholder="<?php echo $dur; ?>" value="<?php echo $dur; ?>" id="Duration">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Start Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" placeholder="<?php echo $date; ?>" value="<?php echo $date; ?>" id="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="f_name" class="col-sm-2 col-form-label ">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status" name="status">
                                    <?php
                                    if ($status == 0) // No investers
                                    {
                                        echo "<option id='status' value='0'> No investors </option>";
                                        echo "<option id='status' value='2'> Started Growing </option>";
                                        echo "<option id='status' value='3'> In progress </option>";
                                        echo "<option id='status' value='4'> Harvested </option>";
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'>  </option>";
                                    } elseif ($status == 1) // Found investersCrop Failed for some reason
                                    {
                                        echo "<option id='status' value='1'> Found investors </option>";
                                        echo "<option id='status' value='2'> Started Growing </option>";
                                        echo "<option id='status' value='3'> In progress </option>";
                                        echo "<option id='status' value='4'> Harvested </option>";
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } elseif ($status == 2) // Started Growing
                                    {
                                        echo "<option id='status' value='2'> Started Growing </option>";
                                        echo "<option id='status' value='3'> In progress </option>";
                                        echo "<option id='status' value='4'> Harvested </option>";
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } elseif ($status == 3) // In progress
                                    {
                                        echo "<option id='status' value='3'> In progress </option>";
                                        echo "<option id='status' value='4'> Harvested </option>";
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } elseif ($status == 4) // Harvested
                                    {
                                        echo "<option id='status' value='4'> Harvested </option>";
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } elseif ($status == 5) // COMPLETED 
                                    {
                                        echo "<option id='status' value='5'> COMPLETED </option>";
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } elseif ($status == 6) // Error
                                    {
                                        echo "<option id='status' value='-1'> Crop Failed for some reason </option>";
                                    } else
                                        echo "<option id='status' value='-100'> ERROR IN STATUS </option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                                </div>
            </center>
        </div>
    </div>
    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
      </div>

</body>

</html>