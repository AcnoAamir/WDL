<?php
session_start();
include '../db/connect.php';

if (isset($_SESSION['username'])) {
    $id = $_POST['id'];
    $name=$_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $res = "UPDATE `storage` SET `Item_Name`='$name',`Item_Price`=$price,`Item_Quantity`=$quantity WHERE `Item_id`=$id";

    if (mysqli_query($conn, $res)) {
        echo "<script>alert('Details Updated');</script>";
        header("refresh:1;list.php");
    } else {
        echo "unsucces";
    }
}
