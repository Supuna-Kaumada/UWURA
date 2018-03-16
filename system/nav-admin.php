<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey  w3-collapse" style="width:260px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <img src="assets/img/user.png" width="150" height="150" alt="User">
    <h4>Hi <br> Welcome <?php echo $dbfirstname ?></h4>
    <hr>
  </div>
  
  <div class="w3-bar-block">  
  <a  href="dashboard.html" target="innside" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-dashboard"></i> Main Dashboard</a>
  
  <button class="w3-button w3-block w3-left-align " onclick="myAccFunc()"><i class="fa fa-user-plus"></i>Add Users</button>
  <div id="demoAcc" class="w3-bar-block w3-hide w3-orange w3-card-4">
     <a href="Add_student.php" target="innside" class="w3-bar-item w3-button "><i class="fa fa-child"></i>Student</a>
     <a href="Add_Lec.php" target="innside" class="w3-bar-item w3-button"><i class="fa fa-male"></i>Lecturer</a>   
     <a href="Add_GenAdmin.php" target="innside" class="w3-bar-item w3-button"><i class="fa fa-user"></i>General Admin</a>
  </div>  
    <a href="Resources.php"  target="innside" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-building"></i> Add New Resource</a>
    
       
    <a  href="Course.php" target="innside" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa fa-book"></i>Add New Course</a>
    
    <a  href="CourseDetails.php" target="innside" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa fa-book"></i>Add Course Details</a>
    
  </div>
</nav>