<?php include_once "NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Positive Progress Center Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="parentSearchAdmin.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round same-size">
        <h2><i class="fa fa-search"></i></h2>
        <p>Search Students</p>
      </div>
      </a>
  
    <a href="teacherAccountCreate.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Create New Teacher</p>
      </div>
      </a>

      <a href="adminAccountCreate.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Create New Admin</p>
      </div>
      </a>

      <a href="teacherAccountRemove.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-minus-square"></i></h2>
        <p>Teacher Account Remove</p>
      </div>
      </a>

      <a href="parentAccountRemove.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-archive"></i></h2>
        <p>Archive Parent</p>
      </div>
      </a>

      <a href="parentAccountUnArchive.php"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-file-archive-o"></i></h2>
        <p>Un-Archive Parent</p>
      </div>
      </a>
  
      <a href="parentPasswordReset.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Parent Password Reset</p>
      </div>
      </a>

      <a href="teacherPasswordReset.php"><div class="w3-quarter w3-black w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Teacher Password Reset</p>
      </div>
      </a>

      <a href="makepost.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-pencil"></i></h2>
        <p>Create a Post</p>
      </div>
      </a>

      <a href="View_Uploads.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round ">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Recent Uploads</p>
      </div>
      </a>

      <a href="View_Incidents.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Incidents</p>
      </div>
      </a>

      <a href="AdminViewCancellations.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Cancellation Requests</p>
      </div>
      </a>

      <a href="adminViewChanges.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Class Change Requests</p>
      </div>
      </a>
      </div>

</div>
  
  </div>
  <div id="school" class="w3-panel w3-grey w3-animate-right w3-margin-bottom">
      <p><h3>School Center Options</h3></p>
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">

  <a href="schoolCreate.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Add School</p>
      </div>
  </a>

  <a href="schoolStudentCreate.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Add School Student</p>
      </div>
  </a>

  <a href="schoolStudentRemove.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-minus-square"></i></h2>
        <p>Remove School Student</p>
      </div>
  </a>

  <a href="adminViewSchools.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round">
        <h2><i class="fa fa-search"></i></h2>
        <p>View Schools</p>
      </div>
  </a>

  </div>
  <h3>Utility</h3>
  <div class="w3-row-padding w3-padding-16 w3-center" id="options">
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