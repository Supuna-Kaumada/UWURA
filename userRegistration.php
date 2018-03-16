<!DOCTYPE html>
<html>
<title>UWU RA User Registration</title>
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

<?php include('system/nav.php'); ?>

<div class="w3-content">

<h1 align="center">User Registration</h1>

 <div class="col-sm-3">
<br>

<img src="assets/img/register.png" width="150" height="150">
<br>
</div>
<div style="border:thin" col-2>
<div class="col-sm-6">
<form class="w3-container w3-light-grey" action="" method="POST">

<br>

 <a href="studentRegistration.php" class="w3-btn w3-orange">Student</a> 
                                  <br>
                                  <br>
                                  <a href="lecturerRegistration.php" class="w3-btn w3-orange">Lecturer</a> 
                                  <br>
                                  <br>
                                  
                                   <a href="genAdminRegistration.php" class="w3-btn w3-orange">General Admin</a>  
    <br>                                  
    <br>
    </form></div> </div>
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
