<?php
session_start();
if(!isset($_SESSION["loggedInTeacher"]) || $_SESSION["loggedInTeacher"] !== true){
  header("location: teacherLogin.php");
    exit; }
    include_once "config.php";
    ?>
    <head>
  <title>Positive Progress Report System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="ColourScheme.css">
</head>
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
<body class="w3-content background" style="max-width:1300px">
<div class="w3-row">
  <div class="w3-half menu w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Positive Progress</h1>
    </div>
    <div class="w3-padding-64">
      <a href="logOut.php" class="w3-button menu w3-block w3-hover-blue-grey w3-padding-16">Logout</a>
    </div>
</div>
<div class="w3-half w3-blue-grey w3-container" style="height:700px">
  <div class="w3-padding-64 w3-center">
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