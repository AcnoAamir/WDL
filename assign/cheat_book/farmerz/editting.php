<!DOCTYPE html>
<?php
include"../back.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand"><img src="..\logo1.png" alt="Logo" style="width:50px" class="d-inline-block align-top" loading="lazy">
  WELCOME&nbsp;&nbsp;$f_name </a>
  <form class="form-inline">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="location.href='index_f.php'">Back</button>
    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" onclick="location.href='logout.php'">Logout</button>
  </form>
</nav>
</body>
</html>

