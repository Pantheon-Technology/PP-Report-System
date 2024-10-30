<?php include_once "teacherMenu.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Positive Progress Center Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="upAndDown.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round same-size">
        <h2><i class="fa fa-upload"></i></h2>
        <p>Upload for Positive Progress Students</p>
      </div>
      </a>
  
    <a href="studentFileUpload.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-upload"></i></h2>
        <p>Upload for School Students</p>
      </div>
      </a>

      <a href="homeworkSearch.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-upload"></i></h2>
        <p>Search Homework</p>
      </div>
      </a>

      <a href="incident_report.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Report an Incident</p>
      </div>
      </a>

      <?php
if($username == 't.archibald'){
    echo '<a href="View_Incident_teacher.php">
            <div class="w3-quarter w3-light-grey w3-margin-left w3-margin-bottom w3-round">
                <h2><i class="fa fa-eye"></i></h2>
                <p>View Incidents</p>
            </div>
          </a>';
}
?>

      <a href="timesheets.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>Upload Timesheet</p>
      </div>
      </a>

      <a href="bookEquipment.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-laptop"></i></h2>
        <p>Book Equipment</p>
      </div>
      </a>

      <a href="displayTimeTable.php"><div class="w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>View your Time Table</p>
      </div>
      </a>

      <a href="teacherViewOwnTimesheet.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>View your Timesheet</p>
      </div>
      </a>

      <a href="addContent.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>Add Purchasable Course Content</p>
      </div>
      </a>

      <a href="searchContent.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>View Purchasable Course Content</p>
      </div>
      </a>

      <a href="teacherNewResourcePack.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>Create Resource Pack</p>
      </div>
      </a>
      <a href="teacherSearchResourcePacks.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>View Resource Packs</p>
      </div>
      </a>

      <a  target="_blank" href="https://positive-progress.co.uk/webmail/log-in"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round same-size">
        <h2><i class="fa fa-envelope"></i></h2>
        <p>Email</p>
      </div>
      </a>
  
    <a target="_blank" href="https://auth.atlas-hub.co.uk/atlashub.onmicrosoft.com/b2c_1a_rest_signup_signin_auth/oauth2/v2.0/authorize?client_id=6d80e7f2-a808-4763-a8df-d3a27555a8bb&redirect_uri=https%3a%2f%2fwww.citation-atlas.co.uk&response_mode=form_post&response_type=code+id_token+token&scope=openid+https%3a%2f%2fAtlasHub.onmicrosoft.com%2fatlas-api%2funity.atlas.api&state=OpenIdConnect.AuthenticationProperties%3dyhcD-APxTgT7_620v9jKH5rPWPPqpHaW8cceJN9qxXuaMN5P5BbvOjxVRFzPyVsCbWB8AsOoH1uP-7F7gib8USgGTpk1tdc8VlnVMxUWBaSuquF-mRZSS_nTI7p3XgQqaXRSE75Ftl6hdLsgEftSsJXE41gMd7Ep24CggsMopvk5ChxJA1fePuIuN0KcaBVC32mCWsMBcoIh1olZOoUNE9UcYoVH-akgSBcuekZ8e6A-G5vuhH930LTDEoify5S3Rtoab2Dy3gEBZpqIa43U_w&nonce=638218567894748559.NjIyNWVjMzMtNDFlNi00Nzk2LTk0NGYtZjBhYzRmODEwMmMyZmZhYzA2NGUtZmYyMC00YWY5LTg1OGEtM2U3NjNhODYyNzkx"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-cog"></i></h2>
        <p>Atlas</p>
      </div>
      </a>

      <a target="_blank" href="https://lms.flicklearning.com/login/"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-cog"></i></h2>
        <p>Flicker learning Login</p>
      </div>
      </a>

      <a href="logOut.php"><div class="w3-quarter w3-black w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-cog"></i></h2>
        <p>logout</p>
      </div>
      </a>

      </div>

</div>

    <?php include_once "footer.php" ?>
  <!-- End page content -->
</div>
