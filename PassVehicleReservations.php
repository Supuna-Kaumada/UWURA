
<?php
	
	
 $id;
//var_dump($_POST);

require 'system/Connection.php';
$conn    = Connect();
$person = $conn->real_escape_string($_POST["pid"]);
$resource_ID=  $conn->real_escape_string($_POST["vehicle"]);
$pickup_date= $conn->real_escape_string($_POST["pDay"]);
$pickup_time= $conn->real_escape_string($_POST['pTime']);

$pickup_date_time = date('Y-m-d H:i:s', strtotime("$pickup_date $pickup_time"));

$arrival_date= $conn->real_escape_string($_POST["aDay"]);
$arrival_time = $conn->real_escape_string($_POST['aTime']);

$arrival_date_time = date('Y-m-d H:i:s', strtotime("$arrival_date $arrival_time")- 1);

$purpose= $conn->real_escape_string($_POST['purpose']);
$places_visit= $conn->real_escape_string($_POST['placesExpectToVisit']);
$no_of_people= $conn->real_escape_string($_POST['noOfPeople']);
$intended_goods= $conn->real_escape_string($_POST['intendedGoods']);
$total_distance = $conn ->real_escape_string($_POST['totalDistance']);
$lecturer = $conn->real_escape_string($_POST['personname']);
//$lec_email= $conn->real_escape_string($_POST['email']);	//for email the request
$approval_type = $conn -> real_escape_string($_POST['approvalstage']);

$sql0 = "SELECT * FROM vehicle_reserve WHERE resourceID='".$resource_ID."' AND (pickupdatetime BETWEEN '".$pickup_date_time."' AND '".$arrival_date_time."')";
$result0 =$conn-> query($sql0);
if(mysqli_num_rows($result0) != 0){
	echo ("The requested resource is already assigned");
}else{
	$query1   = "INSERT into reservation (reqpersonID,resourceID,day,starttime,endtime, purpose) VALUES('".$person."','".$resource_ID."','".$pickup_date."','".$pickup_time."','".$arrival_time."','".$purpose."')";
		
	$result =$conn-> query($query1);
	$reservation_ID = mysqli_insert_id($conn);
	if($result!=0){
		$query4="SELECT firstname,lastname FROM person WHERE personID='".$lecturer."'";
		$result4 =$conn-> query($query4);
		while($row4 = mysqli_fetch_array($result4)){		
					$fullname = "".$row4['firstname']." ".$row4['lastname']."";			
		}
		echo "<h2 align='center'>Reservation Successful !</h2>";
	echo "Sent for the approval to Mr/Ms. ".$fullname."<br>";	

			
		//$GLOBALS['id'];
		echo '</br>';
		echo "Your reservation ID: ". $reservation_ID."" ;

			
		$query3 = "INSERT INTO reservation_approval(personID,reservationID,approvaltype) VALUES('".$lecturer."','".$reservation_ID."','".$approval_type."')"; 
		$success3 = $conn->query($query3);
		echo '</br>';
		
		//mail($lec_email,"Reservation Message","New Reservation has been recieved","From: DoNotReply@abe1112.com");
		
		$query5 = "INSERT INTO vehicle_reserve(resourceID,pickupdate,pickuptime,pickupdatetime,arrivaldate,arrivaltime,arrivaldatetime,purpose,expectedplaces,noofpeople,intendedgoods,totaldistance,availability) VALUES ('".$resource_ID."','".$pickup_date."','".$pickup_time."','".$pickup_date_time."','".$arrival_date."','".$arrival_time."','".$arrival_date_time."','".$purpose."','".$places_visit."','".$no_of_people."','".$intended_goods."','".$total_distance."','Not available')";
		$success5 = $conn->query($query5);
	}else{
		echo "<h2 align='center'>Reservation not Successful !</h2>";
	}
}





$conn->close();
 
?>