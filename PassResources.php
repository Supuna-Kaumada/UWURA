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

<h1 align="center">Add Resource</h1>

 <div class="col-sm-3">

<img src="assets/img/Resources.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
  
<?php
 
require 'system/Connection.php';
$conn    = Connect();
$resource_code= $conn->real_escape_string($_POST['resourceID']);
$resource_title= $conn->real_escape_string($_POST['resourcename']);
$resource_type = $conn->real_escape_string($_POST['resourcecategory']);


$query   = "INSERT into resource(resourceID,resourcename,resourcecategory) VALUES('".$resource_code."','".$resource_title."','".$resource_type."')";
$success = $conn->query($query);
 
if (!$success) {
    die("<h2>Couldn't enter data: ".$conn->error."</h2>");
 
}
 else{
echo "<label>Resource Added Successfully...</label><br>";

if ($resource_type == "Hall"){
echo "<a class='w3-btn w3-orange' href='hall.php'>Click Here To Add Further Information</a>";
}
else if ($resource_type == "Multimedia"){
echo "<a class='w3-btn w3-orange' href='Multimedia.php'>Click Here To Add Further Information</a>";
}
else if ($resource_type == "Vehicle"){
echo "<a class='w3-btn w3-orange' href='Vehicle.php'>Click Here To Add Further Information</a>";
}
 }
 
$conn->close();
 
?>
   
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</div>
    <br>
    </div> 
    </div>
    </body>
    
          
 

<script>
// Script to open and close sidebar when on tablets and phones
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

</body>
</html>

