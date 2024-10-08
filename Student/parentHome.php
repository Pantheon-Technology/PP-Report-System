<?php include_once "../MenusAndFooter/parentMenu.php"; 
$sql = "SELECT * FROM `parents` where `parentUsername` = '$username'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  
  $row = mysqli_fetch_assoc($result);

  $id = $row['parentID'];
  $when = $row['giveCredits'];
  $membershipType = $row['membershipType'];

  $currentDate = date("Y-m-d");

  $timeSince = date("Y-m-d", strtotime("-30 days"));

  if ($when <= $timeSince){
    if ($membershipType == "bronze"){
      $query = "UPDATE `parents` SET `memberCredits` = 1 WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $query);
      $newDate = "UPDATE `parents` SET `giveCredits` = '$currentDate' WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $newDate);
    }
    if ($membershipType == "silver"){
      $query = "UPDATE `parents` SET `memberCredits` = 2 WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $query);
      $newDate = "UPDATE `parents` SET `giveCredits` = '$currentDate' WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $newDate);
    }
    if ($membershipType == "gold"){
      $query = "UPDATE `parents` SET `memberCredits` = 3 WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $query);
      $newDate = "UPDATE `parents` SET `giveCredits` = '$currentDate' WHERE `parentUsername` = '$username'";
      mysqli_query($conn, $newDate);
    }
  }else{ }
  
} else {}
mysqli_close($conn);
?>
      <h1>Parent Home Page</h1>
      <h3>Welcome <?php echo $username; ?></h3>
     
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
    <a href="Reports/viewReport.php"><div class="w3-quarter w3-green w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-archive"></i></h2>
        <p>View Uploads</p>
      </div>
      </a>

      <a href="Homework/homework.php"><div class="w3-quarter w3-brown w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-upload"></i></h2>
        <p>Submit Homework</p>
      </div>
      </a>
  
    <a href="Account/childDetails.php"><div class="w3-quarter w3-yellow w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-user"></i></h2>
        <p>View Account Details</p>
      </div>
      </a>

      <a href="Timetable/parentTimetable.php"><div class="w3-quarter w3-grey w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-calendar"></i></h2>
        <p>My Timetable</p>
      </div>
      </a>

      <a href="https://positive-progress.co.uk/pay-fees/"><div class="w3-quarter w3-cyan w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-cc-visa"></i></h2>
        <p>Pay My Fees</p>
      </div>
      </a>

      <a href="Courses/courseList.php"><div class="w3-quarter w3-white w3-margin-left w3-margin-bottom w3-round w3-hover-opacity w3-hover-opacity">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>Course List</p>
      </div>
      </a>

      <a href="Bookings/parentViewBookings.php"><div class="w3-quarter w3-pink w3-margin-left w3-margin-bottom w3-round w3-hover-opacity w3-hover-opacity">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>View Purchased Courses</p>
      </div>
      </a>

      <a href="ChangeRequest/changeRequest.php"><div class="w3-quarter w3-purple w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-calendar-times-o"></i></h2>
        <p>Class Change Request</p>
      </div>
      </a>

      <a href="Membership/membershipOptions.php"><div class="w3-quarter w3-black w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-cc-visa"></i></h2>
        <p>Purchase Subscription</p>
      </div>
      </a>

      <a href="Payment/purchaseCredits.php"><div class="w3-quarter w3-lime w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-cc-visa"></i></h2>
        <p>Purchase Positive Pennies</p>
      </div>
      </a>

      <a href="Membership/cancellation.php"><div class="w3-quarter w3-orange w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-ban"></i></h2>
        <p>Cancel Tuition</p>
      </div>
      </a>

      <a href="Legal/parentUpload.php"><div class="w3-quarter w3-blue w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-cloud-upload"></i></h2>
        <p>Upload Legal Form</p>
      </div>
      </a>

      <a href="../Utilities/logOut.php"><div class="w3-quarter w3-red w3-margin-left w3-margin-bottom w3-round w3-hover-opacity">
        <h2><i class="fa fa-sign-out"></i></h2>
        <p>Log Out</p>
      </div>
      </a>
      </div>

</div>
  
    </div>
  </div>
<?php include_once "../MenusAndFooter/footer.php" ?>
</body>
</html>