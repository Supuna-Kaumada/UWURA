<!DOCTYPE html>
<html>
<title>UWU RA MLT Time Table</title>
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
$date= $conn->real_escape_string($_POST['day']);
$dayN;
if($date!="" or $date!=NULL or (mb_strlen($date)>0)){
	$dayN=date('l', strtotime($date));
}else{
	unset($dayN);
}
$start_time = $conn->real_escape_string($_POST['sTime']);
$timeS = date("H:i:s",strtotime($start_time));
$end_time = $conn->real_escape_string($_POST['eTime']);
$timeE = date("H:i:s",strtotime($end_time));

if(isset($dayN)){
	$sql = "SELECT * FROM multimedia_reserve WHERE reserveddate='".$date."'"; 	   		
	$result = mysqli_query($conn,$sql);
	echo "<div align='center' class='w3-light-gray'><label for='textfiel'>Reserved Multimedia Equipments on '".$date."'</label>";
	echo "<table border='1'>
	<tr>
	<th class='w3-orange'>Item Code</th>

	<th class='w3-orange'>Availability</th>
	<th class='w3-orange'>Not available From</th>
	<th class='w3-orange'>Not available To</th>
	</tr>";
		
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";

		echo "<td>" . $row['resourceID'] . "</td>";

		echo "<td>" . $row['availability'] . "</td>";
		echo "<td>" . $row['reservefrom'] . "</td>";
		echo "<td>" . $row['reserveto'] . "</td>";
		echo "</tr>";
	}

	
}
echo "</table></div>";


$sql2 = "SELECT * FROM multimedia WHERE resourceID NOT IN(SELECT DISTINCT resourceID FROM multimedia_reserve WHERE reserveddate='".$date."')";
//echo $sql2;
$result2 = mysqli_query($conn,$sql2);
echo "</br>";
echo "<div align='center' class='w3-light-gray'><label for='textfiel'>Availability of Multimedia Equipments on '".$date."'</label>";
echo "<table border='1'>
<tr>
<th class='w3-orange'>Item Code</th>
<th class='w3-orange'>Item Name</th>
<th class='w3-orange'>Location</th>
<th class='w3-orange'>Availability</th>
</tr>";
	
while($row2 = mysqli_fetch_array($result2)){
	echo "<tr>";
	echo "<td>" . $row2['resourceID'] . "</td>";
	echo "<td>" . $row2['itemname'] . "</td>";
	echo "<td>" . $row2['location'] . "</td>";
	echo "<td>" . $row2['availability'] . "</td>";
	echo "</tr>";
}
echo "</table> </div>";

?>
</div>
</body>
</html>