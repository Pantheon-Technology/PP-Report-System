<?php
require_once "../../MenusAndFooter/teacherMenu.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
?>
<body>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
      <h1><?php echo "Incident No." . $id; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM incidents where incidentNumber = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){

              $year = substr($row["date"], 0, 4);
              $month = substr($row['date'], 5, -3);
              $day = substr($row['date'], 8, 10);

              echo "<div class=w3-half>";
              echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
              echo "<p>" . "Date of Incident: " . $day . "/" . $month . "/" . $year . "</p>";
              echo "<p>" . "Time of Incident: " . $row['time'] . "</p>";
              echo "<p>" . "Type of Incident: " . $row['issueType'] . "</p>";
              echo "<p>" . "<b>" . "Statement of Facts/ Description:" . "</b>" . "</p>";
              echo "<p>" . $row['desc'] . "</p>";
              echo "<p>" . "Reffered to: " . $row['reffered'] . "</p>";
              echo "<p>" . "If reffered by other: " . $row['otherReffered'] . "</p>";
              echo "<p>" . "<b>" . "Follow Up Actions: " . "</b>" . "</p>";
              echo "<p>" . $row['followUp'] . "</p>";
              echo "<p>" . "Followed Up By: " . $row['whoFollowedUp'] . "</p>";
              echo "<p>" . "This report was submitted to the system by: " . $row['reportedBy'] . "</p>";
            
              echo "</div>";

              echo "<div class=w3-half>";
              echo "<h4>Witness satements</h4>";
              echo "<h5><b>Witness One :" . $row['w1name'] . "</b></h5>";
              echo "<p>" . "<b>" . "statement" . "</b>" . "</p>";
              echo "<p>" . $row['witness1'] . "</p>";
              echo "<p>" . "<a href='teacher_changeIncidentWitness1.php' class='w3-button w3-round w3-white w3-text-black'>" . "Click Here to add or change witness statement" . "</a>" . "</p>";

              echo "<h5><b>Witness Two :" . $row['w2name'] . "</b></h5>";
              echo "<p>" . "<b>" . "statement" . "</b>" . "</p>";
              echo "<p>" . $row['witness2'] . "</p>";
              echo "<p>" . "<a href='teacher_changeIncidentWitness2.php' class='w3-button w3-round w3-white w3-text-black'>" . "Click Here to add or change witness statement" . "</a>" . "</p>";

              echo "<h5><b>Witness Three :" . $row['w3name'] . "</b></h5>";
              echo "<p>" . "<b>" . "statement" . "</b>" . "</p>";
              echo "<p>" . $row['witness3'] . "</p>";
              echo "<p>" . "<a href='teacher_changeIncidentWitness3.php' class='w3-button w3-round w3-white w3-text-black'>" . "Click Here to add or change witness statement" . "</a>" . "</p>";

              echo "</div>";

              $emailBody = "Student Name: " . $row['studentName'] . "\n" .
             "Date of Incident: " . $row['date'] . "\n" .
             "Time of Incident: " . $row['time'] . "\n" .
             "Type of Incident: " . $row['issueType'] . "\n" .
             "Statement of Facts/ Description:\n" . $row['desc'] . "\n" .
             "Referred to: " . $row['reffered'] . "\n" .
             "If referred by other: " . $row['otherReffered'] . "\n" .
             "Follow Up Actions: " . $row['followUp'] . "\n" .
             "Followed Up By: " . $row['whoFollowedUp'] . "\n" .
             "This report was submitted to the system by: " . $row['reportedBy'] . "\n" .
             "Witness statements\n" .
             "Witness One: " . $row['w1name'] . "\n" . "Statement:\n" . $row['witness1'] . "\n" .
             "Witness Two: " . $row['w2name'] . "\n" . "Statement:\n" . $row['witness2'] . "\n" .
             "Witness Three: " . $row['w3name'] . "\n" . "Statement:\n" . $row['witness3'];

              $emailBodyEncoded = urlencode($emailBody);
              echo "<br>";
              echo "<p>" . "<a href='mailto:youremail@example.com?subject=Incident report ID: " . $id . "&body=" . $emailBodyEncoded;
              echo "' class='w3-button w3-round w3-white w3-text-black'>" . "Email Information" . "</a>" . "</p>";                
              }

              $followUp = "SELECT * FROM `followUp` WHERE `relatedId` = $id";
              $results = mysqli_query($conn, $followUp);

        if (mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){

              echo "<h2>Follow up Actions and Comments</h2>";
              echo "<h6><b>Who followed up?</b></h6>";
              echo "<p>" . $row["followedUpBy"] . "</p>";
              echo "<h6><b>Follow Up Detail</b></h6>";
              echo "<p>" . $row["followUpDetail"] . "</p>";
              echo "<hr>";
            }
          }else{
            echo "<h2>There are no follow up actions yet</h2>";
          }
        }else{
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
  <?php include_once "../../MenusAndFooter/footer.php"; ?>
</body>
</html>