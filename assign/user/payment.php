
<?php
session_start();
include '../db/connect.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM `users` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    $u_id = $row['user_id'];


    $res = "DELETE FROM `cart` WHERE user_id = $u_id";

    if (mysqli_query($conn, $res)) {
        echo "<script>alert('PAYMENT DONE');</script>";
        header("refresh:1;homepage.php");
    } else {
        echo "unsucces";
    }
}
