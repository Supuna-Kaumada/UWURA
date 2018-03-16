<!DOCTYPE html>
<html>
<title>UWU RA </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none}
table{table-layout:auto;}
/*td{width:2px;white-space:nowrap;}*/
</style>
        <script type="text/javascript">
        $(document).ready(function(){
        $("#reservationID").on('change', function(){
        var reservationID_val  = $(this).val();

        $.ajax({
                type: "POST",
                url: "Support.php",
                data: { reservationID: reservationID_val},
                success: function(theResponse) {

                        $('#outputDiv').html(theResponse);

                    }                   
            });
    });

});     
</script>
    </head>
    <body>
    <div class="w3-content">
        <?php
		$dbpersonID = $_GET['person_id'];
        $res_ID;
        $db = mysqli_connect('localhost','root','','uwuresources');
        $sql = "SELECT * FROM reservation JOIN reservation_approval ON reservation.reservationID = reservation_approval.reservationID JOIN resource ON reservation.resourceID = resource.resourceID WHERE reservation_approval.approvaltype='Submitted' AND reservation_approval.personID = '" .$_GET['person_id']. "'";
        $result = mysqli_query($db,$sql);
		echo "<div align='center' class='w3-light-gray'><h3>Submitted Reservations To Take Actions</h3>";

        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        echo "<table border='1'>
        <tr>
        <th class='w3-orange'>Reservation ID</th>
		<th class='w3-orange'>Resource ID</th>
		<th class='w3-orange'>Resource Name</th>
		<th class='w3-orange'>Date</th>
		<th class='w3-orange'>Time</th>
		<th class='w3-orange'>Purpose</th>
        <th class='w3-orange'>Approval Status</th>
        <th class='w3-orange'>Approval DateTime</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['reservationID'] . "</td>";
		echo "<td>" . $row['resourceID'] . "</td>";
		echo "<td>" . $row['resourcename'] . "</td>";
		echo "<td>" . $row['day'] . "</td>";
		echo "<td>" . $row['starttime']. " - ".  $row['endtime'] . " </td>";
		echo "<td>" . $row['purpose'] . "</td>";
        echo "<td>" . $row['approvaltype'] . "</td>";
        echo "<td>" . $row['approvaldatetime'] . "</td>";
        echo "</tr>";
        } 
        echo "</table>";
        ?>
<br></div>
        <form action="PassRecommend.php" method="POST">
        <br>
            <input type="hidden"  name="pid" value="<?php $dbpersonID = $_GET['person_id']; echo $dbpersonID?>">
                <label for="textfield10">Reservation ID:</label>
                <select class="form-control" id="reservationID" name="reservationID">	
                    <?php
                    $db = mysqli_connect('localhost','root','','uwuresources');
                    $sql = "SELECT reservationID FROM reservation_approval WHERE approvaltype='Submitted' AND personID = '" .$_GET['person_id']. "'";
                    $result = mysqli_query($db,$sql);
                    echo "<option>--Select Reservation ID--</option>";
                    while($row = mysqli_fetch_array($result)){
                    echo "<option value='".$row['reservationID']."'>".$row['reservationID']."</option>";
                    }
                    ?>
                </select>
            <br>
                <label for="textfield10">Action :</label>
                <select class="form-control" onchange="toggleDisplay('lect' , this.value)" id="action" name="action">	
                <option value="000">---Select An Option---</option>
                    <option value="Recommended">Recommend</option>
                    
                    <option value="Approved">Approve</option>
                    <option value="Declined">Decline</option>
                </select>
                
                
                <br>
                <script>
								
				function toggleDisplay(id, displayvalue)
		{    
			if ( displayvalue == "Recommended" ) {
				 document.getElementById(id).style.display = 'block';
			} else {
				 document.getElementById(id).style.display = 'none';
			}
		}
				</script>
				
				<div id="lect" style="display: block" >
                <label for="textfield10">Forwarding Person :</label>
                <select class="form-control" id="personID" name="personname">	
                <option value="000">---Select A Person To Forward---</option>
                    <?php
                    $db = mysqli_connect('localhost','root','','uwuresources');
                    $sql = "SELECT * FROM person WHERE category='2' OR category='3'";
                    $result = mysqli_query($db,$sql);

                    while($row = mysqli_fetch_array($result)){
                    echo "<option value='".$row['personID']."'>".$row['firstname']." ".$row['lastname']."</option>";
                    }
                    ?>
                </select>
                                                
				</div>
                <br>
           
            <input type="submit" name="submit" id="submit" value="Proceed" class="w3-btn w3-orange"><br>
            <br>
        </form> 
        
        </div> 
    </body>
</html>