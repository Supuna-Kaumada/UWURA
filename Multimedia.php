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

<h1 align="center">Multimedia Information</h1>

 <div class="col-sm-3">

<img src="assets/img/multi.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>

<form action="PassMultimedia.php" class="w3-container w3-light-grey" method="post">
     <p>
    <label for="textfield">Resource ID:</label>
        <select class="form-control" id="multimediaID" name="multimediaID">
        <option>--Select Item--</option>
	      <?php
	        mysql_connect('localhost','root','');
	        mysql_select_db('uwuresources');
	        $sql = "SELECT * FROM resource WHERE resourcecategory='Multimedia'";
          $result = mysql_query($sql);
	
	        while($row = mysql_fetch_array($result)){
	          echo "<option value=".$row['resourceID'].">".$row['resourceID']."</option>";
	        }
	      ?>	
        </select>
    </p>
   
    <p>
    <label for="textfield2">Item Name:</label>
    <input type="text" class="form-control" name="itemName" id="itemName" placeholder="Enter ItemName" required>
    </p>
    <p>
    <label for="textfield3">Location:</label>
    <select class="form-control" id="location" name="location">
      <option>--Select Location--</option>
      <option value = "Admin">Admin</option>
      <option value = "E1">E1</option>
      <option value = "MLT">MLT</option>
      <option value = "Admin">Admin</option>
      <option value = "E3">E3</option>
    </select>
    </p>
    
   
    
    <input type="submit" name="submit" id="submit" value="Add Multimedia" class="w3-btn w3-orange">
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
