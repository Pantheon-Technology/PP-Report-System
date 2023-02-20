<?php include_once "NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Admin Options</h3>
    <a href="parentSearchAdmin.php" class="w3-button w3-white w3-block w3-hover-blue w3-padding-16 w3-half">View Students</a>
      <a href="teacherAccountCreate.php" class="w3-button w3-grey w3-block w3-hover-brown w3-padding-16 w3-half">Create New Teacher</a>
      <a href="adminAccountCreate.php" class="w3-button w3-grey w3-block w3-hover-black w3-padding-16 w3-half">Create New Admin</a>
      <a href="teacherAccountRemove.php" class="w3-button w3-white w3-block w3-hover-red w3-padding-16 w3-half">Remove Teacher</a>
      <a href="parentAccountRemove.php" class="w3-button w3-white w3-block w3-hover-red w3-padding-16 w3-half">Remove Parent</a>
      <a href="parentPasswordReset.php" class="w3-button w3-grey w3-block w3-hover-yellow w3-padding-16 w3-half">Parent Password Reset</a>
      <a href="teacherPasswordReset.php" class="w3-button w3-grey w3-block w3-hover-green w3-padding-16 w3-half">Teacher Password Reset</a>
      <a href="makepost.php" class="w3-button w3-white w3-block w3-hover-green w3-padding-16 w3-half w3-margin-bottom">Make a Post</a>
      <a href="logOut.php" class="w3-button w3-black w3-block w3-hover-green w3-padding-16 w3-margin-bottom">Logout</a>
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