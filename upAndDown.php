<?php
session_start();
if(!isset($_SESSION["loggedInTeacher"]) || $_SESSION["loggedInTeacher"] !== true){
  header("location: teacherLogin.php");
    exit; }
    include_once "config.php";
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
<link rel="stylesheet" href="index.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
    <!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">My positive Progress - Teacher</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
      <img src="Pictures/logo.png" style="width:220px">
    </div>
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in drop down box on the page
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

    <h1>Upload Report</h1>
    <p>Use the form below to upload a report for a child, you may use the 'username search' to find out their username if required.</p>
      <div class="w3-left-align w3-padding-large">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <p><b>Username for child</b></p>
          <p><input type="text" id="childName" name="childName" placeholder="Name Of Child" required></p>
          <p><b>Name of Document</b></p>
          <p><input type="text" id="reportName" name="reportName" placeholder="Name of document" required></p>
          <p><b>File Upload</b></p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" value="Upload Image" required>Upload Document</button>
        </form>
        
        <h2>Username Search</h2>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>