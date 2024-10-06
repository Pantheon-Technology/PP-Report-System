<?php include_once "../../MenusAndFooter/NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>School Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">

  <a href="Centre/schoolCreate.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Add School</p>
      </div>
  </a>

  <a href="Centre/schoolChangePass.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Change School Password</p>
      </div>
  </a>

  <a href="Student/schoolStudentCreate.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Add School Student</p>
      </div>
  </a>

  <a href="Student/schoolStudentRemove.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-minus-square"></i></h2>
        <p>Remove School Student</p>
      </div>
  </a>
  
  <a href="Student/schoolStudentChangePass.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Change Student Password</p>
      </div>
  </a>

  <a href="Centre/adminViewSchools.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-search"></i></h2>
        <p>View Schools</p>
      </div>
  </a>

  <a href="Student/adminViewSchoolStudent.php"><div class="w3-quarter w3-light-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-search"></i></h2>
        <p>View School Students</p>
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
<script src ="index.js"></script>

</body>
</html>