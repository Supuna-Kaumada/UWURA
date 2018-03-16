 <!DOCTYPE html>
<html>
<title>UWU RA Add Degree</title>
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

<h1 align="center">Add  Course Details</h1>

 <div class="col-sm-3">

<img src="assets/img/course.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
<form class="w3-container w3-light-grey" action="PassCourseDetails.php"  method="POST">
 
    <p>
	<label for="textfield5">Select Course Code:</label>
    <select class="form-control" id="courseID" name="courseID">
	<?php
	
	$db = mysqli_connect('localhost','root','','uwuresources');

	$sql = "SELECT * FROM course";
	$result = mysqli_query($db,$sql);
	
	while($row = mysqli_fetch_array($result)){
	echo "<option value='".$row['courseID']."'>".$row['courseID']."</option>";
	}
	?>	
    </select>
    </p>
    <p>
    <label for="textfield">Select Hall ID:</label>
	
    <select class="form-control" id="resourceID" name="resourceID">	
	<?php
	$sql = "SELECT * FROM hall";
	$result = mysqli_query($db,$sql);
	
	while($row = mysqli_fetch_array($result)){
	echo "<option value='".$row['resourceID']."'>".$row['resourceID']."</option>";
	}
	?>
	</select>
    </p>
	    
    <p>
	<label for="textfield5">Select Course Type:</label>
    <select class="form-control" id="coursetype" name="coursetype">
    <option value="T">Theory</option>
    <option value="P">Practical</option>
    </select>
    </p>
    <p>
	<label for="textfield6">Select Day</label>
    <select class="form-control" id="day" name="day">
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
    </select>
    </p>
	<p>
	<label for="textfield7">Start Time</label>
    <input type="time" class="form-control" name="starttime" id="starttime">
    </p>
	<p>
	<label for="textfield8">End Time</label>
    <input type="time" class="form-control" name="endtime" id="endtime">
    </p>
    
    <p>
	<label for="textfield9">Lecturer 1: </label>
    <select class="form-control" id="personID1" name="personID1" placeholder="Select Lecturer 1"required>	
	<?php
	$db = mysqli_connect('localhost','root','','uwuresources');
	$sql = "SELECT * FROM person WHERE category='2'";
	$result = mysqli_query($db,$sql);
	
	while($row = mysqli_fetch_array($result)){
	echo "<option value='".$row['personID']."'>".$row['personID']."</option>";
	}
	?>
	</select>
    </p>
    
    <p>
	<label for="textfield10">Lecturer 2:</label>
        <select class="form-control" id="personID2" name="personID2">	
	<?php
	$db = mysqli_connect('localhost','root','','uwuresources');
	$sql = "SELECT * FROM person WHERE category='2'";
	$result = mysqli_query($db,$sql);
	
	while($row = mysqli_fetch_array($result)){
	echo "<option value='".$row['personID']."'>".$row['personID']."</option>";
	}
	?>
	</select>
    </p>
    <p>
	<label for="textfield11">Lecturer 3:</label>
        <select class="form-control" id="personID3" name="personID3">	
	<?php
	$db = mysqli_connect('localhost','root','','uwuresources');
	$sql = "SELECT * FROM person WHERE category='2'";
	$result = mysqli_query($db,$sql);
	
	while($row = mysqli_fetch_array($result)){
	echo "<option value='".$row['personID']."'>".$row['personID']."</option>";
	}
	?>
	</select>
    </p>



    
    <input type="submit" name="submit" id="submit" value="Forward" class="w3-btn w3-orange">
  </form>
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
