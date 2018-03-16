 <!DOCTYPE html>
<html>
<title>UWU RA Add Degree</title>
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

<h1 align="center">Add  Course Details</h1>

 <div class="col-sm-3">

<img src="assets/img/course.png" width="250" height="250">
<br>
</div>

<div class="col-sm-6">
<br>
<div style="border:thin" col-2>



<?php
 
require 'system/Connection.php';


$conn    = Connect();
$course_code= $conn->real_escape_string($_POST['courseID']);
$hall_code= $conn->real_escape_string($_POST['resourceID']);
$course_type= $conn->real_escape_string($_POST['coursetype']);
$day_lec = $conn->real_escape_string($_POST['day']);
$start_time = $conn->real_escape_string($_POST['starttime']);
$end_time = $conn->real_escape_string($_POST['endtime']);
$lec_1 = $conn->real_escape_string($_POST['personID1']);
$lec_2 = $conn->real_escape_string($_POST['personID2']);
$lec_3 = $conn->real_escape_string($_POST['personID3']);


$query   = "INSERT into course_details (courseID,resourceID,coursetype,day,starttime,endtime) VALUES('".$course_code."','".$hall_code."','".$course_type."','".$day_lec."','".$start_time."','".$end_time."')";

$query1   = "INSERT into lecturer_course(courseID,coursetype,personID,personID1,personID2) VALUES('".$course_code."','".$course_type."','".$lec_1."','".$lec_2."','".$lec_3."')";
//echo($query1);

$success = $conn->query($query);
$success1 = $conn->query($query1);
 
if (!$success) {
    die("<label>Couldn't enter data: <label>".$conn->error); 
}

if (!$success1) {
    die("<label>Couldn't enter data: </label>".$conn->error); 
} 

echo "<label>Course Details Added Successfully</label>";
 
$conn->close();
 
?>
</div>
</div>
</div>
</body>
</html>
