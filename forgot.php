<?php ?>

<!DOCTYPE html>
<html>
<title>Forgot Password</title>
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

<h1 align="center">Forgot Password</h1>

 <div class="col-sm-3">

<img src="assets/img/login.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
<br>
   
    <form class="w3-container w3-light-grey" action="forgot.php" method="post">
     <br> 
      <label>
        Email Address<span class="req">*</span>
      </label>
      <input   class="w3-input w3-border-0" type="email"  required autocomplete="off" id="email" name="email"/>
    <br>
    <input type="submit" value="Reset" name="submit" class="w3-btn w3-orange" /> 
    <br>  
    <br> 
 
    </form>
    
    </div>
   
    </div>
   
    </div>
    </body>
    
          
    

<?php  
	
	require 'system/Connection.php';
	$conn    = Connect();
	//session_start();
	
// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
        $email=$_POST['email']; 
        $results= $conn->query("SELECT * FROM person WHERE email='".$email."'");  
        $numrows=mysqli_num_rows($results); 
        

		
		
    if ( $numrows == 0 ) // User doesn't exist
    { 
	
       			?>
       	
       	<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Error!</h3>
				<p>User with that email doesn't exist!</p>
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
       	
       	<?php
    }
    else { // User exists (num_rows != 0)

        $row=mysqli_fetch_assoc($results); 
		$hash = $row['hash'];
        $first_name = $row['firstname'];
   

        // Session message to display on success.php
        
        ?>

		<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Password Reset Email!</h3>
				<p>Please check your email <span><?php echo($email); ?></span> for a confirmation link to complete your password reset!
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
  
   <?php
       /* $_SESSION['message'] = "<p>Please check your email <span>$email</span> for a confirmation link to complete your password reset!</p>";*/

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link - UWU Resource Allocation';
        $message_body = '
        Hello Mr./Mrs./Ms.'.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        https://uwura.000webhostapp.com/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
    
    ?>  



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
