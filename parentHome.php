<?php include_once "parentMenu.php"; 
?>
      <h1>Parent Home Page</h1>
      <h3>Welcome <?php echo $username; ?></h3>
     
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="viewReport.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-">
        <h2><i class="fa fa-archive"></i></h2>
        <p>View Uploads</p>
      </div>
      </a>
  
    <a href="childDetails.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-user"></i></h2>
        <p>View Account Details</p>
      </div>
      </a>

      <a href="parentUpload.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-cloud-upload"></i></h2>
        <p>Upload Legal Form</p>
      </div>
      </a>

      <a href="https://positive-progress.co.uk/pay-fees/"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-cc-visa"></i></h2>
        <p>Pay My Fees</p>
      </div>
      </a>

      <a href="changeRequest.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-calendar-times-o"></i></h2>
        <p>Class Change Request</p>
      </div>
      </a>

      <a href="cancellation.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-ban"></i></h2>
        <p>Cancel Subscription</p>
      </div>
      </a>

      <a href="logOut.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-sign-out"></i></h2>
        <p>Log Out</p>
      </div>
      </a>
      </div>

</div>
  
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>