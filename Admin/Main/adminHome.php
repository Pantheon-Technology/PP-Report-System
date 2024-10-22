<?php include_once "../../MenusAndFooter/NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Welcome Back <b><?php echo $username ?>!</b></h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="../Students/studentOptions.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-mortar-board"></i></h2>
        <p>Student Options</p>
      </div>
      </a>
  
    <a href="../Teachers/teacherOptions.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-book"></i></h2>
        <p>Teacher Options</p>
      </div>
      </a>

      <a href="../School/schoolOptions.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-university"></i></h2>
        <p>School Options</p>
      </div>
      </a>

      <a href="../Centre/centreOptions.php"><div class="w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-building"></i></h2>
        <p>Centre Administration</p>
      </div>
      </a>

      <a href="https://positive-progress.co.uk/webmail/log-in" target="_blank"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-envelope"></i></h2>
        <p>Email</p>
      </div>
      </a>
  
    <a  target="_blank" href="https://auth.atlas-hub.co.uk/atlashub.onmicrosoft.com/b2c_1a_rest_signup_signin_auth/oauth2/v2.0/authorize?client_id=6d80e7f2-a808-4763-a8df-d3a27555a8bb&redirect_uri=https%3a%2f%2fwww.citation-atlas.co.uk&response_mode=form_post&response_type=code+id_token+token&scope=openid+https%3a%2f%2fAtlasHub.onmicrosoft.com%2fatlas-api%2funity.atlas.api&state=OpenIdConnect.AuthenticationProperties%3dyhcD-APxTgT7_620v9jKH5rPWPPqpHaW8cceJN9qxXuaMN5P5BbvOjxVRFzPyVsCbWB8AsOoH1uP-7F7gib8USgGTpk1tdc8VlnVMxUWBaSuquF-mRZSS_nTI7p3XgQqaXRSE75Ftl6hdLsgEftSsJXE41gMd7Ep24CggsMopvk5ChxJA1fePuIuN0KcaBVC32mCWsMBcoIh1olZOoUNE9UcYoVH-akgSBcuekZ8e6A-G5vuhH930LTDEoify5S3Rtoab2Dy3gEBZpqIa43U_w&nonce=638218567894748559.NjIyNWVjMzMtNDFlNi00Nzk2LTk0NGYtZjBhYzRmODEwMmMyZmZhYzA2NGUtZmYyMC00YWY5LTg1OGEtM2U3NjNhODYyNzkx"><div class="w3-quarter w3-lime w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cog"></i></h2>
        <p>Atlas</p>
      </div>
      </a>

      <a target="_blank" href="https://lms.flicklearning.com/login/"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cog"></i></h2>
        <p>Flicker learning Login</p>
      </div>
      </a>

      <?php
        if ($username === 'G.jones' || $username === 'BobTheTester') {
        echo '
        <a target="_blank" href="/adminAccountCreate.php">
        <div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
            <h2><i class="fa fa-cog"></i></h2>
            <p>Create admin account</p>
        </div>
        </a>';
      }
      ?>

      <a href="https://mypositiveprogress.co.uk/Utilities/logOut.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-sign-out"></i></h2>
        <p>Logout</p>
      </div>
      </a>

</div>
</div>
  </div>


    <?php include_once "../../MenusAndFooter/footer.php" ?>
  <!-- End page content -->
</div>
<script src="index.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>