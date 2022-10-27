<?php
session_start();
include '../inc/dbh.php';

if (isset($_SESSION['username'])) {
    $f_id = $_SESSION['f_id'];
    $c_id=$_POST['c_id'];
    $dur = $_POST['dur'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    echo ("
c_id = $c_id<br>
dur = $dur<br>
date = $date<br>
status = $status<br>
");

    $res = "UPDATE `contract` SET 
    `duration (months)`=$dur,
    `start_date`=$date,
    `Status`=$status WHERE `contract_id`= $c_id;";

    if (mysqli_query($conn, $res)) {
        echo "<script>alert('Details Updated');</script>";
        header("refresh:1;index_f.php");
    } else {
        echo "unsucces";
    }
}
