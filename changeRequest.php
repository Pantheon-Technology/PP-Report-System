<?php include_once "parentMenu.php"; 
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $sql = "INSERT INTO `changeRequests` (studentName, sessionDate, sessionTime, reason, comments) VALUES (?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($conn, $sql)) {
      
      mysqli_stmt_bind_param($stmt, "sssss", $param_studentName, $param_date, $param_time, $param_reason, $param_comments);

      $param_studentName = trim($_POST['name']);
      $param_date = trim($_POST['sessionDate']);
      $param_time = trim($_POST['sessionTime']);
      $param_reason = trim($_POST['reason']);
      $param_comments = trim($_POST['comments']);
     
      if (mysqli_stmt_execute($stmt)) {
          echo '<script>alert("Your request has been sent to our team, they will respond to your query ASAP");document.location="parentHome.php"</script>';
      } else {
          echo "Oops! Something went wrong. Please try again later.";
      }

      
      mysqli_stmt_close($stmt);
  }
}
mysqli_close($conn);
?>
      <h1>Class Change Request</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Child Full Name*" required name="name"></p>
      
                <label for="reason">Request Type</label>
            <select id="reason" name="reason">
                <option value="Change">Change Session</option>
                <option value="Cancel">Cancel Session</option>
                <option value="Other">Other</option>
            </select>

      <p><b>Date of Original Session*</b></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="date" auto_complete="no" required name="sessionDate"></p>
      
      <p><b>Time of Original Session*</b></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="time" auto_complete="no" required name="sessionTime"></p>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Comments" name="comments"></textarea></p>


      <p><button type="submit">Submit Request</button></p>
    
</form>
</div>
  
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>