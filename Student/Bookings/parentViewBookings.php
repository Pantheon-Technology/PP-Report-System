<?php
include_once "../../MenusAndFooter/parentMenu.php";

?>
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Your Course Bookings</h2>
    <p>Once your booking has been approved by our team, it will no longer appear on this list. Approved bookings will be sent to your timetable which you can view <a href="../Timetable/parentTimeTable.php">here.</a></p>
    <?php 
$sql = "SELECT * FROM `bookings` where `parentUsername` = '$username' ORDER BY `date` DESC";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<table class='w3-green w3-border'>";
  echo "<tr>";
  echo "<th class='w3-border w3-padding'><h3>Parent Username</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Email</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Course</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Child Name</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Date Purchased</h3></th>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {   
    $year = substr($row["date"], 0, 4);
    $month = substr($row['date'], 5, -12);
    $day = substr($row['date'], 8, -8);

    echo "<tr>";
    echo "<td class='w3-border'>" . $row['parentUsername'] . "</td>";
    echo "<td class='w3-border'>" . $row['email'] . "</td>";
    echo "<td class='w3-border'>" . $row['courseTitle'] . "</td>";
    echo "<td class='w3-border'>" . $row['childFName'] . " " . $row['childLName'] . "</td>";
    echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
  }

  echo "</table>";
  echo "</ul>";
} else {
  echo "<h2>You have no bookings currently, this is either because you have not booked a course or your booking has been approved and moved to <a href='parentTimeTable.php'> your time table.</a></h2>";
}

mysqli_close($conn);
?>
</div>
</div>
<?php include_once "../../MenusAndFooter/footer.php";?>
</body></html>