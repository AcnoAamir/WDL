<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "simplilearn_assignment";
    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){
        echo "not connected";
    }

?>