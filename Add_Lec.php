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
	<form class="w3-container w3-light-grey" action="A_Pass-lec.php" method="post">
  <div >
  <br>
    <p>
    <label for="textfield">Lecturer ID:</label>
    <input type="text" class="w3-input w3-border-0" name="personID" id="personID" placeholder="Enter Lecturer ID." pattern="[A-Za-z]{3}[0-9]{5}" required>
    
    </p>

    <p>
    <label for="textfield2">First Name:</label>
    <input type="text" class="w3-input w3-border-0" name="firstname" id="firstname" placeholder="Enter First Name" required>
    </p>
    <p>
    <label for="textfield3">Last Name:</label>
    <input type="text" class="w3-input w3-border-0" name="lastname" id="lastname" placeholder="Enter Last Name" required>
    </p>
    <p>
    <label for="textfield5">Department:</label>
    <!--<input type="text" class="form-control" name="departmentID" id="departmentID" placeholder="Enter Department ID" required>-->
	<select  class="w3-input w3-border-0" id="departmentID" name="departmentID" required>
    <option value="" selected disabled>Select the Department</option>
    <option value="ANS">ANS</option>
	<option value="CST">CST</option>
    <option value="EAG">EAG</option>
    <option value="HTE">MGT</option>
    <option value="SCT">SCT</option>
    <option value="ETEC">TEC</option>
    
	</select>
    </p>
    <p>
      <label for="textfield5">Mobile 1:</label>
    <input type="text" class="w3-input w3-border-0" name="mobile1" id="mobile1" placeholder="Enter Mobile 1" pattern="[0-9]{10}" oninvalid="setCustomValidity('Mobile number should contain 10 digits')" onchange="try{setCustomValidity('')}catch(e){}" required>
    </p>
    <p>
    <label for="textfield5">Mobile 2:</label>
    <input type="text" class="w3-input w3-border-0" name="mobile2" id="mobile2" placeholder="Enter Mobile 2" pattern="^\d{10}$" oninvalid="setCustomValidity('Mobile number should contain 10 digits')" onchange="try{setCustomValidity('')}catch(e){}" />
    </p>

    <p>
    <label for="textfield5">E-mail:</label>
    <input type="email" class="w3-input w3-border-0" name="email" id="email" placeholder="Enter Email" required>
    </p>
    <p>
    <label for="textfield5">Password:</label>
    <input type="password" class="w3-input w3-border-0" name="password" id="password" placeholder="Enter Password" pattern=".{8,}" oninvalid="setCustomValidity('Password must contain atleast 8 characters')" onchange="try{setCustomValidity('')}catch(e){}" required>
    </p>
    <p>
    <label for="textfield5">Confirm Password:</label>
    <input type="password" class="w3-input w3-border-0" name="cpassword" id="cpassword" placeholder="Enter Password" required>
    </p>
    <input type="submit" name="submit" id="submit" value="Register" class="w3-btn w3-orange">
    <p></p>
  
    </div> 
	</form>
      </div>
    <br>
    </div>
    
    </body>   
    

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

</body>
</html>
