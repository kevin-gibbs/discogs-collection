<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vinyl Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>



<?php
include "conn.php";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<div class="container sticky-top">
  <div class="row">
    <div class="col p-1 bg-secondary text-light rounded-top border">
    Artist
    </div>
    <div class="col p-1 bg-secondary text-light rounded-top border">
    Title
    </div>
    <div class="col p-1 bg-secondary text-light rounded-top border">
    Label
    </div>  
    <div class="col p-1 bg-secondary text-light rounded-top border">
    Released
    </div>
</div>
</div>
<?php

$sqlCollection = "SELECT * from collection order by artist";
$resultCollection = $conn->query($sqlCollection);
if ($resultCollection->num_rows > 0) {
    // output data of each row
    while($rowCollection = $resultCollection->fetch_assoc()) {
?>
<div class="container">
  <div class="row">
    <div class="rounded-start col p-1 bg-light gy-1">
    <?php echo $rowCollection['artist'] ?>
    </div>
    <div class="col p-1 bg-light gy-1">
    <?php echo $rowCollection['title'] ?>
    </div>
    <div class="col p-1 bg-light gy-1">
    <?php echo $rowCollection['label'] ?>
    </div>  
    <div class="rounded-end col p-1 bg-light gy-1">
    <?php echo $rowCollection['released'] ?>
    </div>
</div>
</div>
<?php



      
    }
  } 
  
  else {
    echo "0 results";
  }
  $conn->close();
?>
