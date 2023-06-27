<?php
include_once "NewMenuAdmin.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "INSERT INTO `incidents` (`studentName`, `date`, `time`, `issueType`, `desc`, `reffered`, `otherReffered`, `followUp`, `whoFollowedUp`, `reportedBy`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssssssssss", $param_studentName, $param_date, $param_time, $param_issueType, $param_desc, $param_reffered, $param_otherReffered, $param_followUp, $param_whoFollowedUp, $param_reportedBy);
         $param_studentName = trim($_POST['student']);
         $param_date = trim($_POST['date']);
         $param_time = trim($_POST['time']);
         $param_issueType = trim($_POST['incidentType']);
         $param_desc = trim($_POST['description']);
         $param_reffered = trim($_POST['safeguardingStaff']);
         $param_otherReffered = trim($_POST['otherName']);
         $param_followUp = trim($_POST['followUp']);
         $param_whoFollowedUp = trim($_POST['followUpName']);
         $param_reportedBy = $username;   
            
                if (mysqli_stmt_execute($stmt)) {
                  echo '<script>alert("Incident added successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
         mysqli_close($conn);
          }
    
  ?>
 <!DOCTYPE html>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Incident Report</h1>
    <p>Use the form below to fill out an incident report.</p>
      <div class="w3-left-align w3-padding-large">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <p><b>Student Name*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="text" name="student" placeholder="Name the student involved" required></p>
          <p><b>Date of Incident*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="date" name="date" auto_complete="no" required></p>   
          <p><b>Time of Incident*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="time" name="time" required>
          <p><b>Type of Incident*</b></p>
            <p><input type="radio" id="Behavioural" required name="incidentType" value="Behavioural">
            <label for="Behavioural">Behavioural</label>
            <input type="radio" id="Safeguarding" required name="incidentType" value="Safeguarding">
            <label for="Safeguarding">Safeguarding</label>
            <input type="radio" id="Homework" required name="incidentType" value="Homework">
            <label for="Homework">Homework</label>
            <input type="radio" id="Attendance" required name="incidentType" value="Attendance">
            <label for="Attendance">Attendance</label></p>
          <p><b>Statement of Facts*</b></p>
            <p><textarea class="w3-input w3-padding-16 w3-border" type="textarea" auto_complete="no" placeholder="Description of Incident" name="description"></textarea></p>
            <label for="staff">Referred by:*</label>
            <select id="staff" name="safeguardingStaff">
                <option value="Georgia Nisted">Georgia Nisted</option>
                <option value="Lisa Heron">Lisa Heron</option>
                <option value="Katie Dermott">Katie Dermott</option>
                <option value="Kate Allen">Kate Allen</option>
                <option value="Elena Colangelo">Elena Colangelo</option>
                <option value="Other">Other</option>
            </select>
            <p><b>If OTHER, please state...</b></p>
                <p><input class="w3-input w3-border w3-padding-16" type="text" name="otherName" placeholder="Name"></p>
            <p><b>Follow Up Actions</b></p>
                <p><textarea class="w3-input w3-padding-16 w3-border" type="textarea" auto_complete="no" placeholder="What has been done?" name="followUp"></textarea></p>
            <p><b>Who followed up?</b></p>
                <p><input class="w3-input w3-border w3-padding-16" type="text" name="followUpName" placeholder="Name"></p>

          <button class="w3-button w3-black w3-margin-bottom" input type="submit" required name="sendEmail">Upload incident to the system</button>
        </form>
        <?php
            if (isset($_POST['sendEmail'])) {
              $to = 'georgia.nisted@positive-progress.co.uk'; // Replace with the recipient's email address
              $subject = 'Incident Reported'; // Replace with the email subject
              $message = 'An incident has been reported, check the view incidents area on your admin dashboard.'; // Replace with the email message
              $headers = 'From: georgia.nisted@positive-progress.co.uk'; // Replace with the sender's email address

              // Send the email
              if (mail($to, $subject, $message, $headers)) {
              echo "Email sent successfully.";
              } else {
              echo "Failed to send email.";
              }
            }
?>
        
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>