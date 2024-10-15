<?php include_once "../../MenusAndFooter/NewMenuAdmin.php" ?>
  <!--Events tab -->
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Positive Progress Center Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
      
    <a href="Bookings/ViewBookings.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-book"></i></h2>
        <p>View Bookings</p>
      </div>
      </a>

      <a href="Course/addCourse.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Add a Course</p>
      </div>
      </a>

      <a href="Course/newResourcePack.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Add a new resource pack</p>
      </div>
      </a>

      <a href="Course/searchResourcePacks.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>Search resource pack</p>
      </div>
      </a>

      <a href="Posts/makepost.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-pencil"></i></h2>
        <p>Create a Post</p>
      </div>
      </a>

      <a href="Incidents/View_Incidents.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Incidents</p>
      </div>
      </a>

      <a href="Incidents/incident_report_admin.php"><div class="w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Report Incident</p>
      </div>
      </a>

      <a href="Timesheets/view_all_timesheets.php"><div class="w3-quarter w3-light-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>View Timesheets</p>
      </div>
      </a>

      <a href="MeetingMinutes/meetingMinutes.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-file"></i></h2>
        <p>Upload Meeting Minutes</p>
      </div>
      </a>

      <a href="MeetingMinutes/adminViewMeetingMinutes.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Past Meeting Minutes</p>
      </div>
      </a>

      <a href="Equipment/viewEquipment.php"><div class="w3-quarter w3-lime w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cogs"></i></h2>
        <p>Equipment Request</p>
      </div>
      </a>

      <a href="Equipment/viewEquipmentOnUse.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cogs"></i></h2>
        <p>Approved Equipment Requests</p>
      </div>
      </a>

      <a href="Course/addContent-admin.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-plus"></i></h2>
        <p>Add Course Content</p>
      </div>
      </a>

      <a href="Course/searchContent-admin.php"><div class="w3-quarter w3-black w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Content</p>
      </div>
      </a>

      <a href="Policies/uploadPolicies.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-upload"></i></h2>
        <p>Upload Policies & Legal</p>
      </div>
      </a>

      <a href="Policies/managePolicies.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-cog"></i></h2>
        <p>Manage Policies & Legal</p>
      </div>
      </a>

</div>
</div>
  </div>


    <?php include_once "../../MenusAndFooter/footer.php" ?>
</div>
<script src="index.js"></script>
<script>
var mySidebar = document.getElementById("mySidebar");

var overlayBg = document.getElementById("myOverlay");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script src ="index.js"></script>

</body>
</html>