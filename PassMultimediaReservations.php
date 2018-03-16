	<?php
	
	
 $id;
//var_dump($_POST);

require 'system/Connection.php';
$conn    = Connect();
$person = $conn->real_escape_string($_POST["pid"]);
$resource_ID=  $conn->real_escape_string($_POST["multimedia"]);
$date= $conn->real_escape_string($_POST["day"]);
$start_time= $conn->real_escape_string($_POST['sTime']);
$end_time = $conn->real_escape_string($_POST['eTime']);
$purpose= $conn->real_escape_string($_POST['purpose']);
$lecturer = $conn->real_escape_string($_POST['personname']);
//$lec_email= $conn->real_escape_string($_POST['email']);	//for email the request
$approval_type = $conn -> real_escape_string($_POST['approvalstage']);

$query1   = "INSERT into reservation (reqpersonID,resourceID,day,starttime,endtime, purpose) VALUES('".$person."','".$hall_ID."','".$date."','".$start_time."','".$end_time."','".$purpose."')";

$query2   = "INSERT into multimedia_reserve (resourceID,day,reservefrom,reserveto) VALUES('".$resource_ID."','".$date."','".$start_time."','".$end_time."')";

/*$conn->close();
$conn    = Connect();
$sql11 = "SELECT reservationID FROM reservation WHERE resourceID = '".$hall_ID."' AND day= '".$date."' AND starttime='".$start_time."'";
$result =$conn-> query($sql11) or die(mysqli_error());
$GLOBALS['id']=null;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $GLOBALS['id'] =$row["reservationID"];
		echo $GLOBALS['id'];
			
    }
} else {
    echo "0 results";
}
echo '</br>';
//echo $sql11;
*/

	$query4="SELECT firstname,lastname FROM person WHERE personID='".$lecturer."'";
	$result4 =$conn-> query($query4);
	while($row4 = mysqli_fetch_array($result4)){
			
				$fullname = "".$row4['firstname']." ".$row4['lastname']."";
				
			
	}	
		
$result =$conn-> query($query1);

if($result!=0){
	echo "<h2 align='center'>Reservation Successful !</h2>";
	echo "Sent for the approval to Mr/Ms. ".$fullname."<br>";	


		
	
		
}else{
	echo "<h2 align='center'>Reservation not successful !</h2>";	
}

$reservation_ID = mysqli_insert_id($conn);//$GLOBALS['id'];
echo "Your reservation ID: ". $reservation_ID."" ;



$query3 = "INSERT INTO reservation_approval(personID,reservationID,approvaltype) VALUES('".$lecturer."','".$reservation_ID."','".$approval_type."')"; 
$success3 = $conn->query($query3);
echo '</br>';

//mail($lec_email,"Reservation Message","New Reservation has been recieved","From: DoNotReply@abe1112.com");
//echo $query3;

//$success1 = ;

//

/*if () {
    die("Couldn't enter data: ".$conn->error);
 
}else{
	echo '</br>';


	}
*/

$query5 = "INSERT INTO multimedia_reserve (resourceID,reserveddate,reservefrom,reserveto,availability) VALUES ('".$resource_ID."','".$date."','".$start_time."','".$end_time."','Not available')";
//$query5	= "UPDATE multimedia SET availability='Not available' WHERE resourceID='".$resource_ID."'";
$result5 =$conn-> query($query5);


$conn->close();
 
?>