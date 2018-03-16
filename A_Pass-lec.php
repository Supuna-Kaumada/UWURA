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



<div class="w3-content">

<h1 align="center">Lecturer Registration</h1>

 <div class="col-sm-3">
<br>

<img src="assets/img/register.png" width="150" height="150">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
   
     
        
<?php
 
require 'system/Connection.php';
$conn    = Connect();
if(!$conn){
	echo "yes";
	}
$id    = $conn->real_escape_string($_POST['personID']);
$category  = 1;
$firstName   = $conn->real_escape_string($_POST['firstname']);
$lastName   = $conn->real_escape_string($_POST['lastname']);
$mobile1    = $conn->real_escape_string($_POST['mobile1']);
$mobile2 = $conn->real_escape_string($_POST['mobile2']);
$departmentID = $conn->real_escape_string($_POST['departmentID']);
$email = $conn->real_escape_string($_POST['email']);
$password   = md5($conn->real_escape_string($_POST['password']));
$cpassword   = md5($conn->real_escape_string($_POST['cpassword']));
$hash = $conn->escape_string( md5( rand(0,1000) ) );

if($password==$cpassword){
	
$query   = "INSERT into person (personID,category,firstname,lastname,email,password,mobile1,mobile2,degreeID,hash,activated) VALUES('".$id."','".$category."','".$firstName."','".$lastName."','".$email."','".$password."','".$mobile1."','".$mobile2."','".$departmentID."','".$hash."','1')";
$success = $conn->query($query);
 

if (!$success) {
    
 	?>
 	<form class="w3-container w3-light-grey" action="studentRegistration.php" method="POST">
	 <input type="submit" value="Student Registration" onClick="studentRegistration.php"  class="w3-btn w3-orange" />
	</form>
		<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Error!</h3>
				<p><?php die("Couldn't enter data: ".$conn->error); ?>
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
  
   <?php
}
else{
//header["Location:DisplayUsers.php"];
	//include
}
 
}
else {
		header("Location:Add_Student.php"); 
			exit();
}
 
$conn->close();
 
?> 
       
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

</html>
