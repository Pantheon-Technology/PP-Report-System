<?php
include_once "parentMenu.php";
include_once "config.php";
if(!isset($_SESSION["loggedInParent"]) || $_SESSION["loggedInParent"] !== true){
  header("location: parentLogin.php");
    exit; }
    ?>
    <h1>Upload Homework</h1>
    <p>Use the form below to upload your homework</p>
      <div class="w3-left-align w3-padding-large">
        <form action="homeworkUpload.php" method="post" enctype="multipart/form-data">
          <p><input class='w3-input w3-round' required name='fileName' placeholder='Name of File, i.e Algebra'></p>
          <p><input class='w3-input w3-round' required name='subject' placeholder='Class Subject, i.e Maths'></p>
          <p><b>File Upload</b></p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" value="Upload Image" required>Upload Document</button>
        </form> 
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>