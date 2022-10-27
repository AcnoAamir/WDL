<!-- // verify login 
// decide if user is other-->
<?php
@session_start();
include '../db/connect.php';

$username = $_SESSION['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$password3 = $_POST['password3'];
$pwd=$_SESSION['password'];


$flag1=0;
$flag2=0;
// echo("
// <html>
// <body>
// username =  $username <br> 
// password =  $password <br>
// given_password =$pwd<br>
// </body>
// </html>"
// );

// Checking
if (is_null($password) || is_null($password3) || is_null($password2)) {
    // echo "Incomplete form";
    echo '<script language="javascript"> alert("Incomplete form"); </script>';
    header("refresh: 3; chngepwd.php");
}
if (strcmp($password, $pwd) !== 0) {
    // echo "Passwords do not match<br>";
    echo '<script language="javascript"> alert("Old Password is incorrect"); </script>';
     header("refresh: 3; chngepwd.php");
     $flag1=1;
}
if (strcmp($password2, $password3) !== 0) {
    // echo "Passwords do not match<br>";
    echo '<script language="javascript"> alert("New Password do not match"); </script>';
     header("refresh: 3; chngepwd.php");
     $flag2=1;
}

// 
if($flag1==0 && $flag2==0){
    $query = "UPDATE `admin_details` SET `password`='$password2' WHERE `username` = '$username';";
    $res = mysqli_query($conn, $query);
    // checking
    $_SESSION['password']=$password2;
    echo '<script language="javascript"> alert("Updated Password done"); </script>';
    header("refresh: 1; homepage.php");

}
?>