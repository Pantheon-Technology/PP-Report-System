<?php
include_once "../../MenusAndFooter/teacherMenu.php";

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

          }
    
  ?>
 <!DOCTYPE html>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../../Utilities/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in drop down box on the page
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Incident Report</h1>
    <p>Use the form below to fill out an incident report. You can search for a students username using the search box below.</p>
    <h2>Username Search</h2>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Childs Name" />
        <div class="result"></div>
    </div>
      <div class="w3-left-align w3-padding-large">
      <h2>Incident Form</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <?php
          $query = "SELECT * FROM parents ORDER BY `parentUsername` ASC";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    echo "<p>" . "<b>" . "Username of Child" . "</b>" . "</p>";
    echo '<select name="student">';
    echo '<option>' . "select" . '</option>';

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {

        $value = $row['parentUsername']; 

        // Create an option tag with the fetched value
        echo '<option value="' . $value . ' ">' . $value . '</option>';
    }

    // End the dropdown box
    echo '</select>';

    // Free the result set
    mysqli_free_result($result);
} else {
    // Error handling if the query fails
    echo 'Error: ' . mysqli_error($connection);
}
?>
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
 <?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>