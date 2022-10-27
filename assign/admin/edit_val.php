<?php
@session_start();
$username = $_SESSION['username'];
include "../db/connect.php";
// Get the url of the page
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$val = $params['option'];
$q = "SELECT `Item_Name`, `Item_Price`, `Item_Quantity` FROM `storage` WHERE `Item_id` = $val";
$result = mysqli_query($conn, $q);
$rows = mysqli_fetch_array($result);
$i_name = $rows[0];
$price = $rows[1];
$quantity = $rows[2];
// echo"
// name = $name;
// price = $price;
// quantity = $quantity;
// ";
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "../back.php";
?>

<head>
    <style>
        body {
            @media (min-width: 300px) {
                .container {
                    max-width: 300px;
                }
            }
        }

        .form {
            font-style: oblique;
            color: black;
            font-variant-caps: small-caps;
            background-color: wheat;
            width: 75pc;
            align-self: center;
        }
    </style>
    <title>
        Restalking
    </title>

<body>
    <div class="h">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <h6 class="navbar-brand" href="#">WELCOME&nbsp;&nbsp;<?php include '../db/connect.php';
                                                                    $query = "SELECT * FROM `admin_details` WHERE  username = '$username'";
                                                                    $res = mysqli_query($conn, $query);
                                                                    $row = mysqli_fetch_array($res);
                                                                    $name = $row['Name'];
                                                                    echo "$name"; ?></h6>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0 my-sm-0">
                <label for="Time " class="my-sm-0 my-lg-0">Time: <span id="datetime"></span></label>
            </form>
            <!-- Date/Time -->
            <script>
                var dt = new Date();
                document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
            </script>
            <ul class="btn my-2 my-sm-0">
                <button type="button" class="btn btn-outline-danger" type="submit" onclick="location.href='./list.php'">BACK</button>
            </ul>
        </nav>
    </div>
    <div class="m">
        <div class="responsive">
            <center>
                <div class="form">
                    <form method="POST" action="editdetails.php">
                        <div class="container">
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label "> Item_id </label>
                                <div class="col-sm-10">
                                    <input type="text" name="id" readonly="true" class="form-control" value="<?php echo $val; ?>" id="id">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id" class="col-sm-2 col-form-label ">Item Name </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" readonly="true" class="form-control" value="<?php echo $i_name; ?>" id="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f_name" class="col-sm-2 col-form-label ">Item Price </label>
                                <div class="col-sm-10">
                                    <input type="text" name="price" class="form-control" placeholder="<?php echo $price; ?>" value="<?php echo $price; ?>" id="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="f_name" class="col-sm-2 col-form-label ">Quantity </label>
                                <div class="col-sm-10">
                                    <input type="text" name="quantity" class="form-control" placeholder="<?php echo $quantity; ?>" value="<?php echo $quantity; ?>" id="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="blank" class=""></label>
                                <div class="col-sm-10">
                                </div>
                            </div>
                </div>
        </div>
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>
    </div>
    </center>
    </div>
    </div>
    <div class="f2">
        <p align="center"> © All rights reserved to their respective owners </p>
    </div>

</body>

</html>