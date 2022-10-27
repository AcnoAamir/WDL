<!-- // verify login 
// decide if user is admin-->
<?php
@session_start();
include 'inc/dbh.php';

$username = $_POST['username'];
$password = $_POST['password'];
// echo("
// <html>
// <body>
// username =  $username <br> password =  $password
// </body>
// </html>"
// );
// $_SESSION['username'] = $username;


$query = "SELECT * FROM `admin` WHERE  username = '$username' and password = '$password'";
$res = mysqli_query($conn, $query);

if (mysqli_num_rows($res) > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $r=mysqli_fetch_array($res);
    $_SESSION['a_id'] = $r['admin_id'];
    header('Location: admin/index_a.php');
}         //if the user is not admin
else {
    echo "User Not Found";
    header('Location: login.php');
}


?>