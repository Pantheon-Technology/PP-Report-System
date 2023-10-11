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
    <a href="studentOptions.php" class="w3-bar-item w3-button w3-padding">Student Options</a>
    <a href="teacherOptions.php" class="w3-bar-item w3-button w3-padding">Teacher Options</a>
    <a href="schoolOptions.php" class="w3-bar-item w3-button w3-padding">School Options</a>
    <a href="centreOptions.php" class="w3-bar-item w3-button w3-padding">Centre Administration</a>
    <a href="https://positive-progress.co.uk/webmail/log-in" class="w3-bar-item w3-button w3-padding" target="_blank">Email</a>
    <a href="https://auth.atlas-hub.co.uk/atlashub.onmicrosoft.com/b2c_1a_rest_signup_signin_auth/oauth2/v2.0/authorize?client_id=6d80e7f2-a808-4763-a8df-d3a27555a8bb&redirect_uri=https%3a%2f%2fwww.citation-atlas.co.uk&response_mode=form_post&response_type=code+id_token+token&scope=openid+https%3a%2f%2fAtlasHub.onmicrosoft.com%2fatlas-api%2funity.atlas.api&state=OpenIdConnect.AuthenticationProperties%3dyhcD-APxTgT7_620v9jKH5rPWPPqpHaW8cceJN9qxXuaMN5P5BbvOjxVRFzPyVsCbWB8AsOoH1uP-7F7gib8USgGTpk1tdc8VlnVMxUWBaSuquF-mRZSS_nTI7p3XgQqaXRSE75Ftl6hdLsgEftSsJXE41gMd7Ep24CggsMopvk5ChxJA1fePuIuN0KcaBVC32mCWsMBcoIh1olZOoUNE9UcYoVH-akgSBcuekZ8e6A-G5vuhH930LTDEoify5S3Rtoab2Dy3gEBZpqIa43U_w&nonce=638218567894748559.NjIyNWVjMzMtNDFlNi00Nzk2LTk0NGYtZjBhYzRmODEwMmMyZmZhYzA2NGUtZmYyMC00YWY5LTg1OGEtM2U3NjNhODYyNzkx" class="w3-bar-item w3-button w3-padding"  target="_blank">Atlas</a>
    <a href="https://lms.flicklearning.com/login/" class="w3-bar-item w3-button w3-padding"  target="_blank">Flick Learning</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding">Logout</a>
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