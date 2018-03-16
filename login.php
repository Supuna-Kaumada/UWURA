<!DOCTYPE html>
<html>
<title>UWU RA Login</title>
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

<h1 align="center">Login Here</h1>

 <div class="col-sm-3">

<img src="assets/img/login.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
<form class="w3-container w3-light-grey" action="" method="POST">
  <label>E-mail:</label>
  <input type="email" class="w3-input w3-border-0" name="email" id="email" placeholder="Enter Email" required>

  <label>Password:</label>
  <input type="password" class="w3-input w3-border-0" name="password" id="password" placeholder="Enter Password" required>
  <br>
   <input type="submit" value="Login" name="submit" class="w3-btn w3-orange" />  
 
   <p>Not registered?  <a href="userRegistration.php">Register Now</a> | <a href="forgot.php">Forgot Password</a></p>  
    </form>  
    </div>
    <br>
    </div> 
    </div>
    </body>   
    <?php  
	
	require 'system/Connection.php';
	$conn    = Connect();

	
    if(isset($_POST["submit"])){  
      
    if(!empty($_POST['email']) && !empty($_POST['password'])) {  
        $email=$_POST['email'];  
        $pass=md5($_POST['password']);  
         
        $query= $conn->query("SELECT * FROM person WHERE email='".$email."'");  
        $numrows=mysqli_num_rows($query); 
		if($numrows!=0)  
        {  
        while($row=mysqli_fetch_assoc($query))  
        {  
        $dbemail=$row['email'];  
        $dbpassword=$row['password']; 
		$dbpersonID=$row['personID'];
		$dbactivated=$row['activated'];
		$dbcategory=$row['category'];
		$dbfirstname=$row['firstname'];
		$dblastname=$row['lastname'];
        }  
      
        if($email == $dbemail && $pass == $dbpassword && $dbactivated=='1'&& !empty($dbcategory))  
        {  
		
        session_start();  
			
		
        $_SESSION['email']=$email;  
      	$_SESSION['personID']=$dbpersonID;
		$_SESSION['category']=$dbcategory;
		$_SESSION['firstname']=$dbfirstname;
		$_SESSION['lastname']=$dblastname;
		
        /* Redirect browser */
			if($dbcategory=='1'){
			  
			//	header('Location: uwura.000webhostapp.com');
			echo ("<script type='text/javascript'> document.location = 'mainstd.php'; </script>");
				 
			}elseif($dbcategory=='2'){
			//	header("Location: https://uwura.000webhostapp.com/mainlec.php");
				echo ("<script type='text/javascript'> document.location = 'mainlec.php'; </script>");
			}elseif($dbcategory=='3'){
			//	header("Location: https://uwura.000webhostapp.com/mainadm.php");
				echo ("<script type='text/javascript'> document.location = 'mainadm.php'; </script>");
			}
			elseif($dbcategory=='4'){
			//	header("Location: https://uwura.000webhostapp.com/main.php");
			echo ("<script type='text/javascript'> document.location = 'main.php'; </script>");
			}
        
        } elseif($email == $dbemail && $pass == $dbpassword && $dbactivated=='0'){
			?>
       	
       	<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Error!</h3>
				<p>Account not activated!
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
       	
       	<?php
			
			
		}
			
			elseif($email == $dbemail && $pass != $dbpassword)  {
			?>
       	
       	<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Error!</h3>
				<p>Incorrect Password!
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
       	
       	<?php
			
		}
			
        }else{  
		?>
       	
       	<div class="col-sm-4">
			<div class="w3-panel w3-orange w3-display-container">
				<span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
				<h3>Error!</h3>
				<p>Invalid username!
				<br>
				
				</p>
				<br>
				
			</div>
		</div>
       	
       	<?php
        
        }  
      
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
