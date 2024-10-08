<?php include_once "../../MenusAndFooter/NewMenuAdmin.php" ?>
  <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Student Options</h3>

    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="Account/parentSearchAdmin.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-search"></i></h2>
        <p>Search Students</p>
      </div>
      </a>

      <a href="Account/parentAccountRemove.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-archive"></i></h2>
        <p>Archive Student</p>
      </div>
      </a>

      <a href="Account/parentAccountUnArchive.php"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-file-archive-o"></i></h2>
        <p>Un-Archive Student</p>
      </div>
      </a>
  
      <a href="Account/parentPasswordReset.php"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-repeat"></i></h2>
        <p>Student Password Reset</p>
      </div>
      </a>

      <a href="Uploads/View_Uploads.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Recent Uploads</p>
      </div>
      </a>

      <a href="../Centre/Cancellations/AdminViewCancellations.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Cancellation Requests</p>
      </div>
      </a>

      <a href="../Centre/ChangeRequests/adminViewChanges.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Class Change Requests</p>
      </div>
      </a>

      <a href="../Centre/ChangeRequests/adminViewArchivedChanges.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-shadow">
        <h2><i class="fa fa-eye"></i></h2>
        <p>View Archived Class Change Requests</p>
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