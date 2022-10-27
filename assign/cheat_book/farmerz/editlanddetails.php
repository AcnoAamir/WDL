<?php
@session_start();
include "../inc/dbh.php";

$f_id=$_SESSION['f_id'];
$name=$_POST['land_name'];
$size = $_POST['land_size'];
$unit = $_POST['land_unit'];
$own = $_POST['land_own'];
$sec = $_POST['land_sector'];
$cat = $_POST['cat'];

echo"
Farmer Id = $f_id<br>
Land Name = $name<br>
Land Size = $size<br>
Land Unit = $unit<br>
Land Own = $own<br>
Land Sector = $sec<br>
Land Cate = $cat<br>

";

$q="INSERT INTO `farmer_landdetails`(`farmer_id`, `name`, `farmArea_size`, `farmArea_Unit`, `Ownership`, `Sector`, `category`) VALUES ('$f_id','$name','$size','$unit','$own','$sec','$cat')";
if (mysqli_query($conn, $q)) {
    echo "<script>alert('Details Updated');</script>";
    header("refresh:1;fields.php");
} else {
    echo "unsucces";
}