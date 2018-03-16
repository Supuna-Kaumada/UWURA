 <!DOCTYPE html>
<html>
<title>UWU RA Add Resource</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none}
</style>
<body>


<div class="w3-content">

<h1 align="center">Notice.. !</h1>

 <span class="col-sm-3"><img src="assets/img/hall.png" width="250" height="250"></span>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>

<?php
 
require 'Connection.php';
$conn    = Connect();
$hall_code= $conn->real_escape_string($_POST['hallID']);
$hall_capacity= $conn->real_escape_string($_POST['capacity']);
$hall_type = $conn->real_escape_string($_POST['halltype']);

$query   = "INSERT into hall (resourceID,capacity,halltype) VALUES('".$hall_code."','".$hall_capacity."','".$hall_type."')";
$success = $conn->query($query);
 
if (!$success) {
    die("<label>Couldn't enter data: </label>".$conn->error);
 
}
 
echo "<label>Hall Registered Successfully<</label>";
 
$conn->close();
 
?>
</div>
</div>
</body></html>