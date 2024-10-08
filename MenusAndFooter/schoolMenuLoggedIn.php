<?php session_start(); 
$username = $_SESSION['centerUsername'];
require_once(__DIR__ . '../../Utilities/config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>My Positive Progress</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="https://mypositiveprogress.co.uk/pictures/logo.png">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
  
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">My positive Progress for Schools</span>
</div>

<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
      <img src="https://mypositiveprogress.co.uk/Pictures/logo.png" style="width:220px">
    </div>
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
      <a href="https://mypositiveprogress.co.uk/School/Centre/schoolDashboard.php" class="w3-bar-item w3-button w3-padding">Home</a>
      <a href="https://mypositiveprogress.co.uk/School/Centre/schoolViewUploads.php" class="w3-bar-item w3-button w3-padding">View Recent Uploads</a>
      <a href="https://mypositiveprogress.co.uk/School/Centre/school-details-own.php" class="w3-bar-item w3-button w3-padding">Center Details</a>
      <a href="https://mypositiveprogress.co.uk/School/Centre/schoolStudentSearch.php" class="w3-bar-item w3-button w3-padding">Student Search</a>
      <a href="https://mypositiveprogress.co.uk/Utilities/logOut.php" class="w3-button w3-black w3-block w3-hover-green w3-padding-16 w3-margin-bottom">Logout</a>
  </div>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;margin-top:43px;">

<header class="w3-container" style="padding-top:22px">
  <h1 class ="w3-animate-top"><b>My Positive Progress for Schools</b></h1>
</header>

<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">