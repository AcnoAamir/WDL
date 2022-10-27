<?php
@session_start();
include "../inc/dbh.php";

$l_id = $_POST['l_id'];
$name=$_POST['land_name'];
$size = $_POST['land_size'];
$unit = $_POST['land_unit'];
$own = $_POST['land_own'];
$sec = $_POST['land_sector'];
$cat = $_POST['cat'];

echo"
Land Id = $l_id<br>
Land Name = $name<br>
Land Size = $size<br>
Land Unit = $unit<br>
Land Own = $own<br>
Land Sector = $sec<br>
Land Cate = $cat<br>

";

$q="UPDATE `farmer_landdetails` SET `name`='$name',`farmArea_size`='$size',`farmArea_Unit`='$unit',`Ownership`='$own',`Sector`='$sec',`category`='$cat' WHERE `land_id`=$l_id";
if (mysqli_query($conn, $q)) {
    echo "<script>alert('Details Updated');</script>";
    header("refresh:1;fields.php");
} else {
    echo "unsucces";
}