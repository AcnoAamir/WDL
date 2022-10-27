<?php
@session_start();
include '../inc/dbh.php';

if (isset($_SESSION['username'])) {
    $f_id = $_SESSION['f_id'];
    $l_id = $_POST['type'];
    $crop = $_POST['crop']; 
    $dur = $_POST['dur'];
    $date = $_POST['date'];

    echo ("
l_id=$l_id <br>
crop=$crop<br>
dur = $dur<br>
date = $date<br>
");

if(is_null($l_id)||is_null($crop)||is_null($dur)||is_null($date)){
    echo "Incomplete form";
    header("refresh: 1; index_f.php");
}

if($l_id==-1){
    echo "Please select Land";
    header("refresh: 1; index_f.php");
}
$q1 = "SELECT * FROM `contract` WHERE `land_id`= $l_id";
$r = mysqli_query($conn, $q1);
$ro = mysqli_fetch_array($r);


if($ro>0){
    echo "<script>alert('Feild already in use');</script>";
    header("refresh:1;index_f.php");
}
else{
    $res = "INSERT INTO `contract`(`farmer_id`,`investor_id`, `land_id`, `duration (months)`, `start_date`, `Status`,`Crop_Name`) VALUES ('$f_id','3','$l_id','$dur','$date','0','$crop')";

    if (mysqli_query($conn, $res)) {
        $up="UPDATE `farmer_landdetails` SET `Cultivated`='1' WHERE `land_id`=$l_id";
        $rows=mysqli_query($conn,$up);
        echo "<script>alert('Details Updated');</script>";
        header("refresh:1;index_f.php");
    } else {
        echo "unsucces";
    }
}
}