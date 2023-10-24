<?php include_once "NewMenuAdmin.php";?>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Upload Document</h1>
    <p>Use the form below to upload a policy/legal document.</p>
      <div class="w3-left-align w3-padding-large">
        <form action="policyUpload.php" method="post" enctype="multipart/form-data">


          <p><b>Name of Document</b></p>
          <p><input type="text" id="reportName" name="reportName" placeholder="Name of document" required></p>

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