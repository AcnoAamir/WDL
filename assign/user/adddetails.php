<!--  -->

<?php
session_start();
include '../db/connect.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $item_id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $query = "SELECT * FROM `users` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    $u_id = $row['user_id'];

    $query = "SELECT Item_Quantity FROM `storage` WHERE Item_id= $item_id";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($res);
    $quant = $row[0];

    $flag1 = 0;
    $flag2 = 0;


    if ($quantity <= 0) {
        echo "<script>alert('Please enter valid quantity');</script>";
        header("refresh:1;add.php");
        $flag1 = 1;
    }

    if ($quantity > $quant) {
        echo "<script>alert('Not enough $name in store');</script>";
        header("refresh:1;add.php");
        $flag2 = 1;
    } else {
        $quantt = $quant - $quantity;
    }
    if ($flag1 == 0 && $flag2 == 0) {

        $res = "INSERT INTO `cart`(`user_id`, `Item_id`, `quantity`) 
    VALUES ('$u_id','$item_id','$quantity')";

        if (mysqli_query($conn, $res)) {
            echo "<script>alert('$name Added');</script>";
            $res2 = "UPDATE `storage` SET `Item_Quantity` = $quantt WHERE `Item_id` = $item_id;";
            if (mysqli_query($conn, $res2)) {
                // echo "<script>alert('$name eddited in database');</script>";
                header("refresh:1;add.php");
            } else {
                echo "unsucces";
            }
        } else {
            echo "unsucces";
        }
    }
}
