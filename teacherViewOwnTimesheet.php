<?php
include_once "TeacherMenu.php";
include_once "config.php";

// Initialize an associative array to store total hours per project
$totalHoursPerProject = array();

?>

<h1>Your Timesheet</h1>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right w3-padding">
  
<?php 
$sql = "SELECT * FROM timesheet WHERE employee_name = '$username' AND hours_worked != '0' ORDER BY `date` DESC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<table class='w3-green w3-border'>";
  echo "<tr>";
  echo "<th class='w3-border w3-padding'><h3>Week Commencing</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Date</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Hours Worked</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Premises</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Milage</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Toll</h3>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {   
    $year = substr($row["weekCommencing"], 0, 4);
    $month = substr($row['weekCommencing'], 5, -3);
    $day = substr($row['weekCommencing'], 8, 10);

    $year1 = substr($row["date"], 0, 4);
    $month1 = substr($row['date'], 5, -3);
    $day1 = substr($row['date'], 8, 10);

    echo "<tr>";
    echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
    echo "<td class='w3-border'>" . $day1 . "-" . $month1 . "-" . $year1 . "</td>";
    echo "<td class='w3-border'>" . $row['hours_worked'] . "</td>";
    echo "<td class='w3-border'>" . $row['project'] . "</td>";
    echo "<td class='w3-border'>" . $row['milage'] . "</td>";
    echo "<td class='w3-border'>" . $row['tunnel'] . "</td>";

    // Update the total hours for each project
    $project = $row['project'];
    if (!isset($totalHoursPerProject[$project])) {
      $totalHoursPerProject[$project] = 0;
    }
    $totalHoursPerProject[$project] += $row['hours_worked'];
  }

  echo "</table>";
  echo "<h3>Your hours by Premises</h3>";
  echo "<ul>";
  foreach ($totalHoursPerProject as $project => $totalHours) {
    echo "<li>$project: $totalHours hours</li>";
  }
  echo "</ul>";
} else {
  echo "<h2>There are no timesheets for $username</h2>";
}

mysqli_close($conn);
?>

</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>