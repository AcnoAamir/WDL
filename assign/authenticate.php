<!-- // verify login 
// decide if co-ord or faculty -->
<?php
    @session_start();
    include './db/connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    //check if the user is admin
    $query = "select * from admin_details where username = '$username' and password = '$password'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) > 0){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header('Location: admin/homepage.php');
    }
    ////check if the user is faculty
    else{
        $query = "select * from users where username = '$username' and password = '$password'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header('Location: user/homepage.php');
        }
        //if the user is not an admin or faculty
        else {
            echo '<script language="javascript"> alert("USER NOT FOUND"); </script>';
            header('Location: index.php');
        }
    }
    

?>