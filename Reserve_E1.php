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

<h1 align="center">E1 Lecture Hall Reservation</h1>
<div class="col-sm-6">
    <br>
    <div style="border:thin" col-2>
        
        <form class="w3-container w3-light-grey" name="ReservationInputE1" method="POST">
            <br>      
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
            <input type="button" class="w3-button w3-orange" name="getTimeTable" onclick="getTimeTableE1();" value="Get Time Table">
            <form>
                       
            <br><br>
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
            <input type="button" onclick="forwardE1();" class="w3-button w3-orange" value="Forward" name="forward"></form></form>
        
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
        function forwardE1(){
            document.forms['ReservationInputE1'].action = 'http://localhost/PassE1Reservations.php';
            document.forms['ReservationInputE1'].submit();
			document.forms['ReservationInputE1'].target = 'tt';
            document.forms['ReservationInputE1'].reset();
            }
    </script>
    
    <script>
        function getTimeTableE1(){
            document.forms['ReservationInputE1'].action = 'http://localhost/TimeTableE1.php';
            document.forms['ReservationInputE1'].target = 'tt';
            document.forms['ReservationInputE1'].submit();

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
