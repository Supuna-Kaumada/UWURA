
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
    </div> 
      
     <a  href="Recommend.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button "><i class="fa fa-forward"></i> Recommendation</a>
     
     <a  href="Approval.php?person_id=<?php echo $dbpersonID ?>" target="innside" class="w3-bar-item w3-button "><i class="fa fa-forward"></i> Approval</a>
     
    
  </div>
</nav>