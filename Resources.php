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
<form class="w3-container w3-light-grey" action="PassResources.php"  method="POST">
  <br>
   <div>
    <p>
    <label for="textfield">Resource ID:</label>
    <input type="text" class="w3-input w3-border-0" name="resourceID" id="resourceID" placeholder="Enter resource ID" required>
    </p>
    <p>
	<label for="textfield5">Resource Name</label>
    <input type="text"  class="w3-input w3-border-0" name="resourcename" id="resourcename" placeholder="Enter resource name" required>
    </p>

    <p>
	<label for="textfield5">Resource Category:</label>
    <select class="w3-input w3-border-0" id="resourcecategory" name="resourcecategory">
    <option value="" selected disabled>Select the Category</option>
    <option value="Hall">Hall</option>
    <option value="Multimedia">Multimedia</option>
    <option value="Vehicle">Vehicle</option>
    </select>
    </p>
    <input type="submit" name="submit" id="submit" value="Add Resource" class="w3-btn w3-orange">
    <br><br>
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
