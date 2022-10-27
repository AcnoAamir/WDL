<html lang="en">
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

<head>
    <title>Admin Home Page</title>
</head>

<body>
    <!-- h1 -->
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
            <ul class="btn my-2 my-sm-0">
                <button type="button" class="btn btn-outline-secondary" type="submit" onclick="location.href='chngepwd.php'">Change Password</button>
            </ul>
            <ul class="btn my-2 my-sm-0">
                <button type="button" class="btn btn-outline-success" type="submit" onclick="location.href='list.php'">View Stocks</button>
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
                <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='logout.php'">Logout</button>
            </ul>
        </nav>
    </div>


    <div class="m"> 
    <?php
          include 'empty.php';
    ?>
    </div>
    <div class="f2">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>

</body>