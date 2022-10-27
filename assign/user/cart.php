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
    <title>Cart</title>
    <style>
        img {
            width: 40px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        .main {
            margin-top: 50px;
            position: relative;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- h1 -->
    <div class="h">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <h6 class="navbar-brand" href="#">WELCOME&nbsp;&nbsp;<?php include '../db/connect.php';
                                                                    $query = "SELECT * FROM `users` WHERE  username = '$username'";
                                                                    $res = mysqli_query($conn, $query);
                                                                    $row = mysqli_fetch_array($res);
                                                                    $name = $row['Name'];
                                                                    echo "$name"; ?></h6>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <ul class="btn my-2 my-sm-0">
                <button type="button" class="btn btn-outline-success" type="submit" onclick="location.href='add.php'">Add Items</button>
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
                <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='./homepage.php'">Back</button>
            </ul>
            <ul class="btn my-2 my-sm-0">
                <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='logout.php'">Logout</button>
            </ul>

        </nav>
    </div>

    <div class='m'>
        <div class="main">
            <?php
            $query = "SELECT * FROM `users` WHERE  username = '$username'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($res);
            $u_id = $row['user_id'];
            // echo $id;
            $sql = "SELECT `Item_id`, `quantity` FROM `cart` WHERE user_id=$u_id";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=1>";
                    echo "<tr align='center'>";
                    echo "<th width='20%' >Sr no</th>";
                    echo "<th width='30%' >Item name</th>";
                    echo "<th width='20%' >Price</th>";
                    echo "<th width='20%' >Quantity</th>";
                    echo "<th width='10%' ></th>";
                    echo "</tr>";
                    $x = 1;
                    while ($row = mysqli_fetch_array($result)) {

                        $i_id=$row['Item_id'];

                        $nam = "SELECT `Item_Name`, `Item_Price` FROM `storage` WHERE `Item_id` = $i_id";
                        $rem = mysqli_query($conn, $nam);
                        $ro = mysqli_fetch_array($rem);
                        $price = $ro['Item_Price'];
                        $name = $ro['Item_Name'];
                        
                        $val = $i_id;

                        echo "<tr align='center'>";
                        echo "<td>" . $x . "</td>";
                        echo "<td>" . $name. "</td>";
                        echo "<td>" . $price . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        // $_GET['option']=$val;
                        echo "<td> <button type='submit' class='btn btn-success' name='add' onclick=\"location.href='add_val1.php?option=$val'\">Edit Item</button>";
                        echo "</tr>";

                        $x += 1;
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "Your Cart is currently Empty <br>Please add stuff to view them here";
                }
            } else {
                echo "ERROR: Could not able to execute . ";
            }
            ?>
            <center><br><br>
            <button type='button' class='btn btn-outline-success' type="submit" onclick='location.href="./checkout.php"'>CHECKOUT </button>
            </center>
        </div>
    </div>

    <div class="f2">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>

</body>

</html>