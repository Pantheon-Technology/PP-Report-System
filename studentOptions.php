<?php include_once "NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Student Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="parentSearchAdmin.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-search"></i></h2>
        <p>Search Students</p>
      </div>
      </a>

      <a href="parentAccountRemove.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-archive"></i></h2>
        <p>Archive Student</p>
      </div>
      </a>

      <a href="parentAccountUnArchive.php"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-file-archive-o"></i></h2>
        <p>Un-Archive Student</p>
      </div>
      </a>
  
      <a href="parentPasswordReset.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Student Password Reset</p>
      </div>
      </a>

      <a href="View_Uploads.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Recent Uploads</p>
      </div>
      </a>

      <a href="AdminViewCancellations.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Cancellation Requests</p>
      </div>
      </a>

      <a href="adminViewChanges.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Class Change Requests</p>
      </div>
      </a>
</div>
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