<!DOCTYPE html>
<html lang="en">
<?php
//session_start();
include '..\inc\dbh.php';
$id = $_SESSION['f_id'];
// echo $id;
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

        .tab {
            background-color: white;
        }
    </style>

<body>
    <div class="responsive">
        <div class="tab">
            <?php
            
            // echo $id;
            $sql = "SELECT `land_id`,`contract_id`, `investor_id`, `Crop_name`, `Status` FROM `contract` WHERE `farmer_id`=$id";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=1>";
                    echo "<tr align='center'>";
                    echo "<th width='10%' >id</th>";
                    echo "<th width='20%' >Invester name</th>";
                    echo "<th width='20%' >Land Name</th>";
                    echo "<th width='20%' >Crop Name</th>";
                    echo "<th width='20%' >Status</th>";
                    echo "<th width='10%' > <th>";
                    echo "</tr>";
                    $x=1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr align='center'>";
                        $i_id = $row['investor_id'];
                        $l_id=$row['land_id'];
                        // echo $i_id;
                        $inv = "SELECT `first_name`, `last_name` FROM `investor` WHERE `investor_id`= $i_id";
                        $res = mysqli_query($conn, $inv);

                        $nam = "SELECT `name` FROM `farmer_landdetails` WHERE `land_id`=$l_id";
                        $rem = mysqli_query($conn, $nam);
                        $r = mysqli_fetch_array($res);
                        $ro = mysqli_fetch_array($rem);
                        $val = $row['contract_id'];
                        
                        if($row['Status']==0)
                        {$stat='No investors';
                        }
                        elseif($row['Status']==1)
                        {$stat='Found investors';
                        }
                        elseif($row['Status']==2)
                        {$stat='In Progress';
                        }
                        elseif($row['Status']==3)
                        {$stat='Harvested';
                        }elseif($row['Status']==4)
                        {$stat='Completed';
                        }elseif($row['Status']==5)
                        {$stat='No investors';
                        }elseif($row['Status']==-1)
                        {$stat='Crop Failed for some reason';
                        }else{
                            $stat='ERROR';
                        }
                        
                        
                        
                        
                        echo "<td>" . $x . "</td>";
                        echo "<td>" . $r['first_name'] . " " . $r['last_name'] . "</td>";
                        echo "<td>" . $ro[0] . "</td>";
                        echo "<td>" . $row['Crop_name'] . "</td>";
                        echo "<td>" . $stat . "</td>";
                        $x++;
                        // $_GET['option']=$val;
                        echo "<td> <button type='submit' class='btn btn-success' name='edit' onclick=\"location.href='edit_val.php?option=$val'\">Edit</button>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute . ";
            }            
            ?>
        </div>
    </div>
</body>

</html>