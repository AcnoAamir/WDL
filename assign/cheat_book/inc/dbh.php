<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="farmer_app";
 
$conn=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    echo "not connected";
}

// <?php
//     $host = "localhost";
//     $user = "root";
//     $pass = "";
//     $db = "attendance";
//     $conn = mysqli_connect($host, $user, $pass, $db);
//     if(!$conn){
//         echo "not connected";
//     }

//
?>