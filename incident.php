<?php
require_once "NewMenuAdmin.php";
require_once "config.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
?>
</html>
<body>
      <h1><?php echo "Incident No." . $id; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM incidents where incidentNumber = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
              echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
              echo "<p>" . "Date of Incident: " . $row['date'] . "</p>";
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
              echo "<p>" . "<a href='changeIncidentFollowUp.php' class='w3-button w3-round w3-white w3-text-black'>" . "Click Here to change the follow up details" . "</a>" . "</p>";
                
              }
        }else{
            echo "0 results";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  </div>
  <?php include_once "footer.php"; ?>
</body>
</html>