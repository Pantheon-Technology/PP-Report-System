<?php session_start();$username = $_SESSION['studentUsername'];  require_once(__DIR__ . '../../Utilities/config.php');?>
<!DOCTYPE html>
<html>
<head>
<title>My Positive Progress</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<link rel="icon" href="https://mypositiveprogress.co.uk/pictures/logo.png">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
    <!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">My positive Progress - School Student</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
      <img src="https://mypositiveprogress.co.uk/Pictures/logo.png" style="width:220px">
    </div>
    <p><h4><i class="fa fa-user"> <b><?php echo $username; ?></i></b></h4></p>
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="https://mypositiveprogress.co.uk/School/Student/studentHome.php" class="w3-bar-item w3-button w3-padding">Home</a>
    <a href="https://mypositiveprogress.co.uk/School/Student/studentViewReport.php" class="w3-bar-item w3-button w3-padding">View Reports</a>
    <a href="https://mypositiveprogress.co.uk/School/Student/studentDetails.php" class="w3-bar-item w3-button w3-padding">View Account</a>
    <a href="https://mypositiveprogress.co.uk/Utilities/logOut.php" class="w3-bar-item w3-button w3-padding">Logout</a>
  </div>
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