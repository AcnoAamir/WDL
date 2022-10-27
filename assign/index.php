<?php
session_start();
include './back.php';
if (isset($_SESSION['username'])) {
    echo '<script language="javascript"> alert("LOGIN AGAIN.."); </script>';
    session_unset();
    session_destroy();
}
?>

<head>
    <title>Login Page</title>
    <style>
        body {
            margin: unset;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: black;

        }

        .card {
            margin-top: 50px;
            position: relative;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class='h'>
    </div>
    <div class='m'>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center">Login Page</h4>
                <p class="card-text">
                <form method="POST" action="authenticate.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" id="name" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" id="password" name="password">
                    </div>
                    <center><button type="submit" class="btn btn-primary" onsubmit="location.href='authenticate.php'">Login</button></center>

                    <br><center><a href="./new.php" class="card-link"style="text-align: center">New User</a></center>
                </form>
                </p>
            </div>
        </div>
    </div>
    </div>
    <div class="f">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>

</body>

</html>