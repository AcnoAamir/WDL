<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-new-tab" data-toggle="tab" href="#nav-new" role="tab" aria-controls="nav-new" aria-selected="false">New</a>
    <a class="nav-item nav-link" id="nav-existing-tab" data-toggle="tab" href="#nav-existing" role="tab" aria-controls="nav-existing" aria-selected="false">Exisitng</a>
    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">Edit</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <?php
    include 'empty.php'
    ?>
  </div>
  <div class="tab-pane fade" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
  <?php
   include 'new.php';
   ?>
  </div>
  <div class="tab-pane fade" id="nav-existing" role="tabpanel" aria-labelledby="nav-existing-tab">
  <?php
   include 'existing.php';
   ?>
  </div>
  <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
  <?php
   include 'edit.php';
   ?>
  </div>
</div>    
</body>
</html>

