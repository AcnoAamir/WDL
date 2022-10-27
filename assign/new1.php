<!-- // verify login 
// decide if user is other-->
<?php
@session_start();
include './db/connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$type = $_POST['type'];
$name = $_POST['name'];

// echo("
// <html>
// <body>
// username =  $username <br> 
// password =  $password <br>
// name $name <br>
// type $type 
// </body>
// </html>"
// );
// $_SESSION['username'] = $username;

// Checking
if (is_null($username) || is_null($password) || is_null($name) || is_null($password2)) {
    // echo "Incomplete form";
    echo '<script language="javascript"> alert("Incomplete form"); </script>';
    header("refresh: 3; new.php");
}
if ($type == "-1") {
    // echo "Please Select Usertype<br>";
    echo '<script language="javascript"> alert("Please Select Usertype"); </script>';
    header("refresh: 3; new.php");
}

if (strcmp($password, $password2) !== 0) {
    // echo "Passwords do not match<br>";
    echo '<script language="javascript"> alert("Passwords do not match"); </script>';
     header("refresh: 3; new.php");
}

// 
if ($type == "0")  // farmer
{
    echo "You chose User";
    $query = "SELECT * FROM `users` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript"> alert("Username already taken"); </script>';
        header("refresh: 3; register.php");
    }         //if the username is taken
    else {
        $query = "INSERT INTO `users`(`username`, `password`, `Name`)
    VALUES ('$username','$password','$name')";
        $res = mysqli_query($conn, $query);
        // Checking
        $query = "SELECT * FROM `users` WHERE  username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            echo '<script language="javascript"> alert("Registration success"); </script>';
            header("refresh: 1; login.php");
        }         //if the username is taken

    }
} elseif ($type == '1') //Admin
{
    echo "You chose Admin";
    $query = "SELECT * FROM `admin_details` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript"> alert("Username already taken"); </script>';
        header("refresh: 3; register.php");
    }         //if the username is taken
    else {
        $query = "INSERT INTO `admin_details`(`username`, `password`, `Name`)
        VALUES ('$username','$password','$name')";
        $res = mysqli_query($conn, $query);
        // checking
        $query = "SELECT * FROM `admin_details` WHERE  username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            echo '<script language="javascript"> alert("Registration done"); </script>';
            header("refresh: 1; login.php");
        }         //if the username is taken
    }
}

?>