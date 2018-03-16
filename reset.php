<!DOCTYPE html>
<html>
<title>Reset Your Password</title>
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

<h1 align="center">Choose Your New Password</h1>

 <div class="col-sm-3">

<img src="assets/img/login.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>
<form class="w3-container w3-light-grey" action="reset_password.php" method="POST">
   <p>
    <label for="textfield5">New Password:</label>
    <input type="password" class="w3-input w3-border-0" name="newpassword" id="newpassword" placeholder="Enter New Password" pattern=".{8,}" oninvalid="setCustomValidity('Password must contain atleast 8 characters')" onchange="try{setCustomValidity('')}catch(e){}" required>
    </p>
    <p>
    <label for="textfield5">Confirm New Password</label>
    <input type="password" class="w3-input w3-border-0" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
    </p>
   <input type="submit" value="Reset" name="submit" class="w3-btn w3-orange" />  
 <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">   
          <br><br>
    </form>  
    </div>
    <br>
    </div> 
    </div>
    </body> 

    
<?php

	require 'system/Connection.php';
	$conn    = Connect();
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $conn->escape_string($_GET['email']); 
    $hash = $conn->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $conn->query("SELECT * FROM person WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        echo("You have entered invalid URL for password reset!");
        
    }
}
else {
    echo("Sorry, verification failed, try again!") ;
    
}
?>
<script>
//password conformation
	var password = document.getElementById("newpassword")
  , confirm_password = document.getElementById("confirmpassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Doesn't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
	</script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
