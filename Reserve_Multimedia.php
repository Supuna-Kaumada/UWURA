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

<h1 align="center">Multimedia Reservation</h1>
<div class="col-sm-6">
    <br>
    <div style="border:thin" col-2>
      
<form name="ReservationInputMultimedia" class="w3-container w3-light-grey" method="POST">
    	<label for="textfield">Select date:</label>
     	<input type="date" class="w3-input w3-border-0" name="day">
      	<input type="hidden"  name="pid" value="<?php $dbpersonID = $_GET['person_id']; echo $dbpersonID?>">
        <br>
        
        <table>
        <tr><td>
        <label for="textfield">Select time:</label></td><td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        From</td><td>
        <input type="time" class="w3-input w3-border-0" name="sTime"></td><td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To</td><td>
        <input type="time" class="w3-input w3-border-0" name="eTime"></td></tr></table>
        <br>
         <input type="button" class="w3-button w3-orange" name="getTimeTable" onclick="getMultimediaAvailability();" value="Check Availability">   
        
   <form>
   <br>
   <label>Select Equipments:</label>
     
        <select class="w3-input" name="multimedia">
        <option>--Select Item--</option>	
		<?php
		$db = mysqli_connect('localhost','root','','uwuresources');
		$sql = "SELECT * FROM multimedia";
		$result = mysqli_query($db,$sql);
	
		while($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['resourceID']."'>".$row['itemname']."</option>";
		}
		?>
        </select>
      
          <label for="textfield">Reservation Purpose:</label>
    	<textarea name="purpose" class="w3-input w3-border-0" id="purpose" name="purpose"></textarea>
        
        <label for="textfield">Lecturer:</label>
        
        <select class="w3-input w3-border-0"  id="personID" name="personname">	
        <option>--Select Lecturer--</option>
		<?php
		$db = mysqli_connect('localhost','root','','uwuresources');
		$sql = "SELECT * FROM person WHERE category='2'";
		$result = mysqli_query($db,$sql);
	
		while($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['personID']."'>".$row['firstname']. " " .$row['lastname']."</option>";
		}
		?>
		</select>
        
		<input type="hidden"  id="approvalstage" name="approvalstage" value="Submitted">
        
        <br>
        <input type="reset" class="w3-button w3-orange" value="Reset">&nbsp;&nbsp;
      <input type="button" onclick="forwardmul();" class="w3-button w3-orange" value="Forward" name="forward"></form></form>

        
      </div>
        <br>   
        </div>
        <br>
        
  <div class="col-sm-6">
            <iframe name="tt" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"></iframe> 
          
          <script>
			  function resizeIframe(obj) {
				obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
			  }
		   </script>
		</div>	
     
</div>
        
    </body> 
    

 <script>
        function forwardmul(){
            document.forms['ReservationInputMultimedia'].action = 'http://localhost/PassMultimediaReservations.php';
            document.forms['ReservationInputMultimedia'].submit();
			document.forms['ReservationInputMultimedia'].target = 'tt';
            document.forms['ReservationInputMultimedia'].reset();
            }
    </script>
    
    <script>
    function getMultimediaAvailability(){
        document.forms['ReservationInputMultimedia'].action = 'http://localhost/MultimediaAvailability.php';
		document.forms['ReservationInputMultimedia'].target = 'tt';
        document.forms['ReservationInputMultimedia'].submit();
        }
</script>
<script>
//password conformation
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("cpassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
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
