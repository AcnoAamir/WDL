<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include '../db/connect.php';
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

<head>
    <style>
        body {
            @media (min-width: 300px) {
                .container {
                    max-width: 300px;
                }
            }
        }
        table {
            margin-left: auto;
            margin-right: auto;
        }
        form {
            font-style: oblique;
            color: grey;
            font-variant-caps: small-caps;
        }

        .tab {
            background-color: white;
        }
    </style>
    <title> View Items </title>

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
    <div class='m'>
            <?php
            
            // echo $id;
            $sql = "SELECT `Item_id`, `Item_Name`, `Item_Price`, `Item_Quantity` FROM `storage` WHERE 1";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=1>";
                    echo "<tr align='center'>";
                    echo "<th width='20%' >id</th>";
                    echo "<th width='30%' >Item name</th>";
                    echo "<th width='20%' >Price</th>";
                    echo "<th width='20%' >Quantity</th>";
                    echo "<th width='10%' ></th>";
                    echo "<th width='10%' ></th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {

                        $val = $row['Item_id'];

                        echo "<tr align='center'>";
                        echo "<td>" . $row['Item_id'] . "</td>";
                        echo "<td>" . $row['Item_Name']."</td>";
                        echo "<td>" . $row['Item_Price'] . "</td>";
                        echo "<td>" . $row['Item_Quantity'] . "</td>";
                        // $_GET['option']=$val;
                        echo "<td> <button type='submit' class='btn btn-success' name='edit' onclick=\"location.href='edit_val.php?option=$val'\">Edit</button>";
                        echo "<td> <button type='button' class='btn btn-danger' name='delete' onclick=\"location.href='del_val.php?option=$val'\"> X </button>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute . ";
            }     
            ?>
            <center><br><br>
            <button type='button' class='btn btn-outline-success' type="submit" onclick='location.href="./add_item.php"'>ADD NEW </button>
            </center>
        </div>
    <div class="f2">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>

</body>

</html>