<?php
session_start();
include '../db/connect.php';

if (isset($_SESSION['username'])) {
    $id = $_POST['id'];
    $name=$_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $res = "INSERT INTO `storage`(`Item_id`, `Item_Name`, `Item_Price`, `Item_Quantity`) VALUES ('$id','$name','$price','$quantity')";


    if (mysqli_query($conn, $res)) {
        echo "<script>alert('$name Added');</script>";
        header("refresh:1;list.php");
    } else {
        echo "unsucces";
    }
}
