<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include '..\inc\dbh.php';
$id = $_SESSION['f_id'];
// echo $id;
$q1 = "SELECT `first_name`, `last_name` FROM `farmer` WHERE `farmer_id`=$id";
$r = mysqli_query($conn, $q1);
$ro = mysqli_fetch_array($r);
$name = $ro[0] . " " . $ro[1];


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

        table {
            font-style: oblique;
           background-color: White;
           width: 75pc;
        }
        td{
            text-align: center;
            padding: 10px;
        }
    </style>


</head>
<!-- style= "width:700px" -->

<body>
    <div class="h">
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"><img src="..\logo1.png" alt="Logo" style="width:50px" class="d-inline-block align-top" loading="lazy">
                WELCOME&nbsp;&nbsp;<?php echo "$name"; ?>
            </a>
            <form class="form-inline">
            <input class="btn btn-outline-success my-2 my-sm-0" type="refresh" onclick="location.href='index_f.php'" value="Back">
  &nbsp;&nbsp;
  <input class="btn btn-outline-danger my-2 my-sm-0" type="refresh" onclick="location.href='logout.php'"value="Logout">  </form>
    </div>
    <div class="m">
        <center>
        <div class="responsive">
            <div class="tab">
                <?php

                // echo $id;
                $sql = "SELECT `land_id`, `name`, `farmArea_size`, `farmArea_Unit`, `Ownership`, `Sector`, `category`,`Cultivated` FROM `farmer_landdetails` WHERE farmer_id=$id";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border=1>";
                        echo "<tr align='center'>";
                        echo"<th width='5%' > Sr No. </th>";
                        echo "<th width='15%' >Field name</th>";
                        echo "<th width='10%' >Farm Size</th>";
                        echo "<th width='10%' >Farm Unit</th>";
                        echo "<th width='10%' >Ownership</th>";
                        echo "<th width='10%' >Sector</th>";
                        echo "<th width='10%' >Category</th>";
                        echo "<th width='10%' >Crop</th>";
                        echo "<th width='10%' >In Use ?</th>";
                        echo "<th width='10%' >Status</th>";
                        echo "";
                        echo "<th width='10%' > </th>";
                        echo "</tr>";
                        $x=1;
                        while ($row = mysqli_fetch_array($result)) {

                            echo "<tr align='center'>";
                            $l_id=$row['land_id'];
                            $q = "SELECT `Crop_Name`, `Status` FROM `contract` WHERE `land_id`=$l_id";
                            $res = mysqli_query($conn, $q);
                            $rows = mysqli_fetch_array($res);
                            if ($rows['Status'] == 0) {
                                $stat = 'No investors';
                            } elseif ($rows['Status'] == 1) {
                                $stat = 'Found investors';
                            } elseif ($rows['Status'] == 2) {
                                $stat = 'In Progress';
                            } elseif ($rows['Status'] == 3) {
                                $stat = 'Harvested';
                            } elseif ($rows['Status'] == 4) {
                                $stat = 'Completed';
                            } elseif ($rows['Status'] == 5) {
                                $stat = 'No investors';
                            } elseif ($rows['Status'] == -1) {
                                $stat = 'Crop Failed for some reason';
                            } else {
                                $stat = 'ERROR';
                            }
                            if ($row['Cultivated'] == 0){
                                $cul = 'No';
                            }else{
                                $cul='Yes';
                            }



                            echo "</tr>";
                            echo "<td>" . $x . "</td>";
                            $x++;
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['farmArea_size'] . "</td>";
                            echo "<td>" . $row['farmArea_Unit'] . "</td>";
                            echo "<td>" . $row['Ownership'] . "</td>";
                            echo "<td>" . $row['Sector'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . $rows['Crop_Name'] . "</td>";
                            echo "<td>" . $cul . "</td>";
                            echo "<td>" . $stat . "</td>";
                            echo "<td> <button type='submit' class='btn btn-success' name='edit' onclick=\"location.href='edit_field.php?option=$l_id'\">Edit</button>";
                            echo "</tr>";   
                        }
                        echo "</table><br><br>";
                        echo"<button type='submit' class='btn btn-success' name='new' onclick=\"location.href='new_field.php'\">Add New</button>";

                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo "No records matching your query were found.<br><br>";
                        echo"<button type='submit' class='btn btn-success' name='new' onclick=\"location.href='new_field.php'\">Add New</button>";
                        
                    }
                } else {
                    echo "ERROR: Could not able to execute . ";
                }
                ?>
            </div>
            </center>
        </div>
        <div class="f">
            <p align="center"> © All rights reserved to their respective owners </p>
        </div>
</body>

</html>