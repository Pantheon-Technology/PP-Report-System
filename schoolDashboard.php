<?php
include_once "schoolMenuLoggedIn.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3><?php echo $username . " "; ?>Admin Options</h3>
      
  </div>

  <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
  <a href="schoolViewUploads.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round">
      <h2><i class="fa fa-paperclip"></i></h2>
      <p>View Recent Uploads</p>
    </div>
    </a>

  <a href="school-details-own.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
      <h2><i class="fa fa-user"></i></h2>
      <p>Center Details</p>
    </div>
    </a>

    <a href="schoolStudentSearch.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round">
      <h2><i class="fa fa-search"></i></h2>
      <p>Student Search</p>
    </div>
    </a>

    <a href="logOut.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round">
      <h2><i class="fa fa-sign-out"></i></h2>
      <p>Logout</p>
    </div>
    </a>
    </div>
    
</div>
    <?php include_once "footer.php" ?>
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
<script src ="index.js"></script>

</body>
</html>