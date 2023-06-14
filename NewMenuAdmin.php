<?php include_once "config.php";  session_start();
 if(!isset($_SESSION["loggedInAdmin"]) || $_SESSION["loggedInAdmin"] == false){
   header("location: adminLogin.php");
   exit;
 }
 $username = $_SESSION['adminUsername']; ?>
<html>
<head>
<title>My Positive Progress</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<link rel="icon" href="pictures/logo.png">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>



</head>
<body class="w3-light-grey">
    <!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">My positive Progress - Admin</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
      <img src="Pictures/logo.png" style="width:220px">
    </div>
    <p><h4><i class="fa fa-user"> <b><?php echo $username ?></i></b></h4></p>
    <h5>Positive Progress Center</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="adminHome.php" class="w3-bar-item w3-button w3-padding">Home</a>
    <a href="parentSearchAdmin.php" class="w3-bar-item w3-button w3-padding">View Students</a>
    <a href="teacherAccountCreate.php" class="w3-bar-item w3-button w3-padding">Create New Teacher</a>
    <a href="adminAccountCreate.php" class="w3-bar-item w3-button w3-padding">Create New Admin</a>
    <a href="teacherAccountRemove.php" class="w3-bar-item w3-button w3-padding">Remove Teacher</a>
    <a href="parentAccountRemove.php" class="w3-bar-item w3-button w3-padding">Archive Parent</a>
    <a href="parentAccountUnArchive.php" class="w3-bar-item w3-button w3-padding">Un-Archive Parent</a>
    <a href="parentPasswordReset.php" class="w3-bar-item w3-button w3-padding">Parent Password Reset</a>
    <a href="teacherPasswordReset.php" class="w3-bar-item w3-button w3-padding">Teacher Password Reset</a>
    <a href="makepost.php" class="w3-bar-item w3-button w3-padding">Make a Post</a>
    <a href="View_Uploads.php" class="w3-bar-item w3-button w3-padding">View Recent Uploads</a>
    <a href="View_Incidents.php" class="w3-bar-item w3-button w3-padding">View Incident Reports</a>
    <a href="adminViewCancellations.php" class="w3-bar-item w3-button w3-padding">View Cancellations</a>
    <a href="adminViewChanges.php" class="w3-bar-item w3-button w3-padding">View Class Change Requests</a>
    <a href="view_all_timesheets.php" class="w3-bar-item w3-button w3-padding">View Timesheets</a>
  </div>
  <h5>School Options</h5>
    <a href="schoolCreate.php" class="w3-bar-item w3-button w3-padding">Add school</a>
    <a href="adminViewSchools.php" class="w3-bar-item w3-button w3-padding">Search schools</a>
    <a href="schoolStudentCreate.php" class="w3-bar-item w3-button w3-padding">Create School Student</a>
    <a href="schoolStudentRemove.php" class="w3-bar-item w3-button w3-padding">Remove School Student</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;margin-top:43px;">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
  <h1 class ="w3-animate-top"><b>My Positive Progress</b></h1>
</header>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">