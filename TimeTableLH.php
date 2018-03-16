<!DOCTYPE html>
<html>
<title>UWU RA LH Time Table</title>
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

<?php

include 'system/Connection.php';
//var_dump($_POST);

$conn    = Connect();

$hall_ID= $conn->real_escape_string($_POST['hall']);
$hall;
if($hall_ID!="" or $hall_ID!=NULL or (mb_strlen($hall_ID)>0)){
	$hall=$hall_ID;
}
else{
	unset($hall);
}

$date= $conn->real_escape_string($_POST['day']);
$dayN;
if($date!="" or $date!=NULL or (mb_strlen($date)>0)){
	$dayN=date('l', strtotime($date));
}
else{
	unset($dayN);
}

$start_time = $conn->real_escape_string($_POST['sTime']);
$timeS = date("H:i:s",strtotime($start_time));
$end_time = $conn->real_escape_string($_POST['eTime']);
$timeE = date("H:i:s",strtotime($end_time));

	if(isset($hall) and isset($dayN)){
		$sql3 = "SELECT courseID,starttime,endtime FROM course_details WHERE resourceID='".$hall."' and day='".$dayN."' UNION SELECT purpose,starttime,endtime FROM reservation WHERE resourceID='".$hall_ID."' and day='".$date."'"; 
		//echo $sql3;   		
		$result3 = mysqli_query($conn,$sql3);
		echo "<div align='center' class='w3-light-gray'><label for='textfiel'>Time table for '".$hall_ID."' on '".$date."'</label>";
		echo "<table border='1'>
		<tr>
		<th class='w3-orange'>Course Code ID</th>
		<th class='w3-orange'>Start Time</th>
		<th class='w3-orange'>End Time</th>

		</tr>";
		
		
		while($row3 = mysqli_fetch_array($result3))
{
echo "<tr>";

echo "<td>" . $row3['courseID'] . "</td>";
echo "<td>" . $row3['starttime'] . "</td>";
echo "<td>" . $row3['endtime'] . "</td>";

echo "</tr>";
} 

echo "</table></div>";/*

		while($row3 = mysqli_fetch_array($result3)){
			echo '</br>';
			
			echo $row3['courseID'];
			echo '					';
			echo $row3['starttime'];
			echo '					';
			echo $row3['endtime'];
			echo '					';
			
			echo '</br>';
		}exit();*/
		
	}elseif(isset($timeS) and isset($dayN)) {
		$sql2 = "SELECT courseID,starttime,endtime,resourceID FROM course_details WHERE starttime='".$timeS."' and day='".$dayN."' UNION SELECT purpose,starttime,endtime,resourceID FROM reservation WHERE starttime='".$timeS."' and day='".$date."'";
		//echo $sql2;
		$result2 = mysqli_query($conn,$sql2);	
		echo "<div align='center' class='w3-light-gray'><label for='textfiel'>Time table for '".$dayN."' '".$timeS."' onwards<label>";
		echo "<table border='1'>
		<tr>
		<th class='w3-orange'>Course Code ID</th>
		<th class='w3-orange'>Start Time</th>
		<th class='w3-orange'>End Time</th>
		<th class='w3-orange'>Lecture Hall</th>
		</tr>";
		while($row2 = mysqli_fetch_array($result2)){
			echo "<tr>";

			echo "<td>" . $row2['courseID'] . "</td>";
			echo "<td>" . $row2['starttime'] . "</td>";
			echo "<td>" . $row2['endtime'] . "</td>";
			echo "<td>" . $row2['resourceID'] . "</td>";

			echo "</tr>";
} 

echo "</table></div>";
		
	}elseif(isset($hall)and isset($timeS)) {
		$sql1 = "SELECT courseID,starttime,endtime,resourceID FROM course_details WHERE starttime='".$timeS."' and resourceID='".$hall."' UNION SELECT purpose,starttime,endtime,resourceID FROM reservation WHERE starttime='".$timeS."' and resourceID='".$hall."'";
		//echo $sql1;
		$result1 = mysqli_query($conn,$sql1);
			
		echo "<div align='center' class='w3-light-gray'><label for='textfiel'>Time table for '".$hall."' starts from '".$timeS."'</label>";
		echo "<table border='1'>
		<tr>
		<th class='w3-orange'>Course Code ID</th>
		<th class='w3-orange'>Start Time</th>
		<th class='w3-orange'>End Time</th>
		<th class='w3-orange'>Lecture Hall</th>
		</tr>";
		while($row1 = mysqli_fetch_array($result1)){
			echo "<tr>";

			echo "<td>" . $row1['courseID'] . "</td>";
			echo "<td>" . $row1['starttime'] . "</td>";
			echo "<td>" . $row1['endtime'] . "</td>";
			echo "<td>" . $row1['resourceID'] . "</td>";

			echo "</tr>";
} 

echo "</table></div>";
		
	}elseif(isset($timeS) and isset($timeE)){
		//$sql4 = "SELECT * FROM course_details WHERE starttime>='{$timeS}' and endtime<='{$timeE}'";	
		$sql4 = "SELECT * FROM course_details WHERE starttime>='$timeS' and endtime<='$timeE'";
		$result4 = mysqli_query($conn,$sql4);
		while($row4 = mysqli_fetch_array($result4)){
			echo $row4['resourceID'];
			echo '		';
			echo $row4['day'];
			echo '		';
			echo $row4['courseID'];
			echo '</br>';
		}exit();
		
	}else{
		echo "<label for='textfiel'>Nothing To Display</label> <p align='justify'>Please Select a Hall, a Day or  a Time to Display the Time Table Here</p>";
 		exit();
	}
	
$purpose= $conn->real_escape_string($_POST['purpose']);


?>