<?php include_once "../../MenusAndFooter/NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Teacher Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
  
    <a href="Account/teacherAccountCreate.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus-square"></i></h2>
        <p>Create New Teacher</p>
      </div>
      </a>

      <a href="Account/teacherAccountRemove.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-minus-square"></i></h2>
        <p>Teacher Account Remove</p>
      </div>
      </a>

      <a href="Account/teacherPasswordReset.php"><div class="w3-quarter w3-black w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Teacher Password Reset</p>
      </div>
      </a>
      <a href="TimeTable/teacherTimeTable.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>Add class to timetable</p>
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