<?php
session_start();
include '../db/connect.php';

if (isset($_SESSION['username'])) {
    
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$val = $params['option'];
    $res = "DELETE FROM `storage` WHERE `Item_id`=$val";

    if (mysqli_query($conn, $res)) {
        echo "<script>alert('Deleted Successfully');</script>";
        header("refresh:0;list.php");
    } else {
        echo "unsucces";
    }
}

