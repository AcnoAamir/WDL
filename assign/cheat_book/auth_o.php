<!-- // verify login 
// decide if user is other-->
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


$query = "SELECT * FROM `investor` WHERE  username = '$username' and password = '$password'";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $r=mysqli_fetch_array($res);
    $_SESSION['o_id'] = $r['investor_id'];
    header('Location: other/index_o.php');
}         //if the user is not other
else {
    echo "User Not Found";
    header('Location: login.php');
}


?>