<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse" style="width:260px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <img src="assets/img/user.png" width="150" height="150" alt="User">
    <h4>Hi <br> Welcome <?php echo $dbfirstname ?></h4>
    <hr>
  </div>
  
  <div class="w3-bar-block">  
  <a  href="dashboard.html" target="innside" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-dashboard"></i> Main Dashboard</a>
  
  <button class="w3-button w3-block w3-left-align " onclick="myAccFunc()"><i class="fa fa-building"></i>Hall Reservations</button>
  <div id="demoAcc" class="w3-bar-block w3-hide w3-orange w3-card-4">
     <a href="Reserve_MLT.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button"><i class="fa fa-building"></i>MLT</a>
     <a href="Reserve_E1.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button"><i class="fa fa-building"></i>E1 Hall</a>   
     <a href="Reserve_LecHall.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button"><i class="fa fa-building"></i>Other Halls</a>
  </div>  
    
    <button class="w3-button w3-block w3-left-align " onclick="myAccFunc1()"><i class="fa fa-circle"></i>Other Reservations</button>
  <div id="demoAcc1" class="w3-bar-block w3-hide w3-orange w3-card-4">
     <a href="Reserve_Multimedia.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button "><i class="fa fa-microphone"></i>Multimedia</a>
     <a href="Reserve_Vehicle.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button"><i class="fa fa-cab"></i>Vehicles</a>   
      </div> 
      
     <a  href="Recommend.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button "><i class="fa fa-forward"></i> Recommendation</a>
     
     <a  href="Approval.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button "><i class="fa fa-forward"></i> Approval</a>
     
    
  </div>
</nav>