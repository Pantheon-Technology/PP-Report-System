<?php include_once "NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Positive Progress Center Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
      
    <a href="ViewBookings.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-book"></i></h2>
        <p>View Bookings</p>
      </div>
      </a>

      <a href="addCourse.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Add a Course</p>
      </div>
      </a>

      <a href="makepost.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-pencil"></i></h2>
        <p>Create a Post</p>
      </div>
      </a>

      <a href="View_Incidents.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Incidents</p>
      </div>
      </a>

      <a href="incident_report_admin.php"><div class="w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Report Incident</p>
      </div>
      </a>

      <a href="view_all_timesheets.php"><div class="w3-quarter w3-light-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>View Timesheets</p>
      </div>
      </a>

      <a href="meetingMinutes.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-file"></i></h2>
        <p>Upload Meeting Minutes</p>
      </div>
      </a>

      <a href="adminViewMeetingMinutes.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Past Meeting Minutes</p>
      </div>
      </a>

      <a href="viewEquipment.php"><div class="w3-quarter w3-lime w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cogs"></i></h2>
        <p>Equipment Request</p>
      </div>
      </a>

      <a href="viewEquipmentOnUse.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cogs"></i></h2>
        <p>Approved Equipment Requests</p>
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