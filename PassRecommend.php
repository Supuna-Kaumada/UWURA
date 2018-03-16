<!DOCTYPE html>
<html>
<title>UWU RA Registration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="system/assets/css/bootstrap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none}
</style>
<body>


<div class="w3-content">

<h1 align="center">Notice</h1>


<div class="col-sm-3">
<div style="border:thin" col-2>
 



<?php
 $id;
//var_dump($_POST);

require 'system/Connection.php';
$conn    = Connect();

$res_ID = $conn->real_escape_string($_POST['reservationID']);

$recID =  $conn->real_escape_string($_POST["pid"]);


	$approval_person = $conn->real_escape_string($_POST['personname']);
	//$approval_person_email= $conn->real_escape_string($_POST['email']);	//for email the recommend
	$action = $conn -> real_escape_string($_POST['action']);
	
	 $conn    = Connect();
		
		
	echo '</br>';
	
if ($action == 'Recommended')
{	
	$conn    = Connect();
	$query = "UPDATE reservation_approval SET personID = '".$approval_person."',approvaltype ='".$action."' ,recomendPID = '".$recID."' WHERE reservationID='".$res_ID."'"; 
	$success = $conn->query($query);
	
	?>
	<div class="col-sm-4">
				<div class="w3-panel w3-orange w3-display-container">
					
					<h3>SuccesFul !</h3>
					<p>Reservation Forwarded Succesfully !
					<br>
					
					</p>
					<br>
					
				</div>
			</div>
			<?php 
}			
elseif ($action == 'Approved')
{	
	$conn    = Connect();
	$query1 = "UPDATE reservation_approval SET approvaltype ='".$action."' WHERE reservationID='".$res_ID."'"; 
	$success1 = $conn->query($query1);
	
	?>
	<div class="col-sm-4">
				<div class="w3-panel w3-orange w3-display-container">
					
					<h3>SuccesFul !</h3>
					<p>Reservation Approved Succesfully !
					<br>
					 Requester was Informed via e-mail.
					</p>
					<br>
					
				</div>
			</div>
			<?php 
			
			$conn    = Connect();
	$querym = "SELECT firstname,email FROM person JOIN reservation ON person.personID = reservation.reqpersonID WHERE reservationID = '".$res_ID."'"; 
		
	$result = $conn->query($querym);
	$row = $result->fetch_assoc();
	$email = $row["email"];
		$to = $email;
        $subject = 'Allocation Success';
        $message_body = '
        Hello '.$row["firstname"].',

        Your Reservation On Reservation ID : '.$res_ID.'  was Approved Successfully.
		
		Thank You !';  

        mail( $to, $subject, $message_body );
			
			
			
			
			
}
elseif($action == 'Declined')
{	
	$conn    = Connect();
	$query2 = "UPDATE reservation_approval SET approvaltype ='".$action."' WHERE reservationID='".$res_ID."'";
	$success2 = $conn->query($query2);
	
	
		?>
		<div class="col-sm-4">
				<div class="w3-panel w3-orange w3-display-container">
					
					<h3>SuccesFul !</h3>
					<p>Reservation Declined Succesfully !
					<br>
					 Requester was Informed via e-mail.
					</p>
					<br>
					
				</div>
			</div>
			<?php
			
			$conn    = Connect();
	$querym = "SELECT firstname,email FROM person JOIN reservation ON person.personID = reservation.reqpersonID WHERE reservationID = '".$res_ID."'"; 
	
	$result = $conn->query($querym);
	$row = $result->fetch_assoc();
	$email = $row["email"];
		$to = $email;
        $subject = 'Allocation Failed';
        $message_body = '
        Hello '.$row["firstname"].',

        Your Reservation On Reservation ID : '.$res_ID.'  was Declined. Please try again on another day or tie slot.
		
		Thank You !';  

        mail( $to, $subject, $message_body );
			
			
	
	
}else{
		?>
	 <div class="col-sm-4">
				<div class="w3-panel w3-orange w3-display-container">
					
					<h3>Error !</h3>
					<p><?php die("Couldn't Handle. Error: ".$conn->error);?> !
					<br>
					
					</p>
					<br>
					
				</div>
			</div>
	<?php
}
$conn->close();
 
?>
</div></div></div></body></html>