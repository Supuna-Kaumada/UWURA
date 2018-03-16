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

 <span class="col-sm-3"><img src="assets/img/multi.png" width="250" height="250"></span>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>

<?php
 
require 'system/Connection.php';
$conn    = Connect();
$id    = $conn->real_escape_string($_POST['multimediaID']);
$itemName   = $conn->real_escape_string($_POST['itemName']);
$location   = $conn->real_escape_string($_POST['location']);


$query   = "INSERT into multimedia(resourceID,itemname,location) VALUES('".$id."','".$itemName."','".$location."')";
$success = $conn->query($query);
 
if (!$success) {
    die("<label>Couldn't enter data: </label>".$conn->error);
 
}
 
echo "<label>Multimedia Registered Successfully</label>";
 
$conn->close();
 
?>

</div>
</div>
</body></html>