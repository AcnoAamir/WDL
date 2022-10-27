<!-- // verify login 
// decide if user is other-->
<?php
@session_start();
include 'inc/dbh.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$cat = $_POST['cat'];
$type = $_POST['type'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$phone2 = $_POST['phone2'];
$city = $_POST['city'];
$state = $_POST['state'];
$district = $_POST['dist'];
$pin = $_POST['pin'];

// echo("
// <html>
// <body>
// username =  $username <br> 
// password =  $password <br>
// type = $type <br>
// first name $f_name <br>
// last name $l_name <br>
// gender $gender <br>
// age $age <br>
// number $phone <br>
// nu,ber $phone2 <br>
// city $city <br>
// state $state <br>
// dist $district <br>
// pin $pin <br>
// </body>
// </html>"
// );
// $_SESSION['username'] = $username;

// Checking
if (is_null($username) || is_null($password) || is_null($type) || is_null($f_name) || is_null($l_name) || is_null($gender) || is_null($age) || is_null($phone) || is_null($city) || is_null($state) || is_null($district) || is_null($pin)) {
    echo "Incomplete form";
    header("refresh: 3; register.php");
}
if ($type == "-1") {
    echo "Please Select Usertype<br>";
    header("refresh: 3; register.php");
}

if (strcmp($password, $password2) !== 0) {
    echo "Passwords do not match<br>";
    header("refresh: 3; register.php");
}
if (is_numeric($age) == false) {
    echo "Invalid Age<br>";
    header("refresh: 3; register.php");
}
if (strlen($phone) < 10 || is_numeric($phone) == false) {
    echo "Invalid Phone number<br>";
    header("refresh: 3; register.php");
}

if (is_null($phone2) == false) {
    if (is_numeric($phone2) == false || strlen($phone2) < 10) {
        echo "Invalid Alternative Phone number<br>";
        header("refresh: 3; register.php");
    }
}



// 
if ($type == "0")  // farmer
{
    echo "You chose Farmer";
    $query = "SELECT * FROM `farmer` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript"> alert("Username already taken"); </script>';
        header("refresh: 3; register.php");
    }         //if the username is taken
    else {
        $query = "INSERT INTO `farmer`(`username`, `password`, `first_name`, `last_name`, `age`, `gender`, `category`, `state`, `district`, `village/town`, `pincode`, `mobile_no`) 
    VALUES ('$username','$password','$f_name','$l_name','$age','$gender','$cat','$state','$district','$city','$pin','$phone');";
        $res = mysqli_query($conn, $query);
        // Checking
        $query = "SELECT * FROM `farmer` WHERE  username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            echo '<script language="javascript"> alert("Registration success"); </script>';
            header("refresh: 3; login.php");
        }         //if the username is taken

    }
} elseif ($type == '1') //Investor
{
    echo "You chose Investor";
    $query = "SELECT * FROM `investor` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript"> alert("Username already taken"); </script>';
        header("refresh: 3; register.php");
    }         //if the username is taken
    else {
        $query = "INSERT INTO `investor`(`username`, `password`, `first_name`, `last_name`, `city`, `district`, `state`, `pincode`, `mobile_no`, `business_no`) VALUES ('$username','$password','$f_name','$l_name','$city','$district','$state','$pin','$phone','$phone2')";
        $res = mysqli_query($conn, $query);
        // checking
        $query = "SELECT * FROM `investor` WHERE  username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            echo '<script language="javascript"> alert("Registration Successful"); </script>';
            header("refresh: 3; login.php");
        }         //if the username is taken

    }
} elseif ($type == '2') //Admin
{
    echo "You chose Admin";
    $query = "SELECT * FROM `admin` WHERE  username = '$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo '<script language="javascript"> alert("Username already taken"); </script>';
        header("refresh: 3; register.php");
    }         //if the username is taken
    else {
        $query = "INSERT INTO `admin`(`username`, `password`, `first_name`, `last_name`) VALUES ('$username','$password','$f_name','$l_name')";
        $res = mysqli_query($conn, $query);
        // checking
        $query = "SELECT * FROM `admin` WHERE  username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            echo '<script language="javascript"> alert("Registration done"); </script>';
            header("refresh: 3; login.php");
        }         //if the username is taken
    }
}

?>