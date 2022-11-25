<?php
session_start();
include_once "config.php";
if(!isset($_SESSION["loggedInTeacher"]) || $_SESSION["loggedInTeacher"] !== true){
  header("location: teacherLogin.php");
    exit; }?>
<div class="w3-row">
  <div class="w3-half w3-black w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Positive Progress</h1>
    </div>
    <div class="w3-padding-64">
     <a href="index.php" class="w3-button w3-black w3-block w3-hover-blue-grey w3-padding-16">Home</a>
     <a href="logOut.php" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">Logout</a>
    </div>
  </div>
<div class="w3-half w3-blue-grey w3-container" style="height:700px">
  <div class="w3-padding-64 w3-center">
    <h1>Upload Report</h1>
      <div class="w3-left-align w3-padding-large">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <p><b>Name of the child</b></p>
          <p><input type="text" id="childName" name="childName" placeholder="Name Of Child" required></p>
          <p><b>Name of Document</b></p>
          <p><input type="text" id="reportName" name="reportName" placeholder="Name of document" required></p>
          <p><b>File Upload</b></p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" value="Upload Image" required>Upload Document</button>
        </form>
        <br><br><br>
        <a class="w3-button w3-round w3-indigo" href = "logOut.php">Log Out</a>
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>