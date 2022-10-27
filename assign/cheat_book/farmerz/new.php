<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
include '..\inc\dbh.php';
$id = $_SESSION['f_id'];
// echo $id;
$q = "SELECT `farmer_id`, `username`, `password`, `first_name`, `last_name`, `age`, `gender`, `category`, `qualification`, `state`, `district`, `block`, `village/town`, `pincode`, `mobile_no` FROM `farmer` WHERE farmer_id=$id;";
$t = mysqli_query($conn, $q);
$r = mysqli_fetch_array($t);
$f_name = $r['first_name'];
$l_name = $r['last_name'];
$name = $f_name . " " . $l_name;
// echo $id;
$q1 = "SELECT `land_id`,`name` FROM `farmer_landdetails` WHERE `farmer_id`=$id";
$result = mysqli_query($conn, $q1);
// echo $result;
// $rows = mysqli_fetch_array($result);
// echo $rows;
// while ($rows = mysqli_fetch_array($result)) {
    // $f_id = $rows[0];
    // $named = $rows[1];
    // echo "<option id='$f_id' value='$f_id'>$name</option>";
    // echo $f_id;
    // echo "\t";
    // echo $named;
    // echo "\n";
// }

?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>...</title>

    <style>
        body {
            @media (min-width: 300px) {
                .container {
                    max-width: 300px;
                }
            }
        }

        form {
            font-style: oblique;
            color: grey;
            font-variant-caps: small-caps;
        }
    </style>

<body>
    <div class="responsive">

        <form method="POST" action="editdetail.php">
            <div class="container">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label ">Farmer_id </label>
                    <div class="col-sm-10">
                        <input type="text" name="id" readonly="true" class="form-control" value="<?php echo $id; ?>" id="f_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">Name </label>
                    <div class="col-sm-10">
                        <input type="text" name="f_name" readonly="true" class="form-control" placeholder="<?php echo $f_name; ?>" value="<?php echo $f_name; ?>" id="f_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">Field </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="type" name="type">
                            <option id="SELECT" value="-1">--SELECT--</option>
                            <?php
                            $q1 = "SELECT `land_id`,`name` FROM `farmer_landdetails` WHERE farmer_id=$id";
                            $result = mysqli_query($conn, $q1);
                            while ($rows = mysqli_fetch_array($result)) {
                                $l_id = $rows[0];
                                $named = $rows[1];
                                echo "<option id='l_id' value='$l_id'>$named</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">Name of crop</label>
                    <div class="col-sm-10">
                        <input type="text" name="crop" class="form-control" placeholder="Name" id="crop">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">Duaration (In Months)</label>
                    <div class="col-sm-10">
                        <input type="text" name="dur" class="form-control" placeholder="Duration" id="Duration">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="f_name" class="col-sm-2 col-form-label ">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" id="date">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>