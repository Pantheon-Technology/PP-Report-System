<?php
include_once "config.php";
include_once "NewMenuAdmin.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $_SESSION['parent'] = $_POST['parent'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['childName'] = $_POST['student'];
  $_SESSION['courseTitle'] = $_POST['course'];
  $_SESSION['bookingID'] = $_POST['bookingID'];
  echo '<script>alert("Student' . $_SESSION['childName'] .  ' has been chosen, click OK to continue");document.location="addToStudentTimeTable.php"</script>';
}

?>
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Course Bookings</h2>
    <?php 
$sql = "SELECT * FROM `bookings` ORDER BY `date` asc";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<table class='w3-green w3-border'>";
  echo "<tr>";
  echo "<th class='w3-border w3-padding'><h3>Parent Username</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Email</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Course</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Child Name</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Date Booked</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Add to Timetable</h3></th>";
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
    echo "<form class='w3-center' method='POST' action=''>";
    echo "<td class='w3-border'>";
    echo "<input type='hidden' name='parent' value='". $row['parentUsername'] . "'>";
    echo "<input type='hidden' name='email' value='". $row['email'] . "'>";
    echo "<input type='hidden' name='course' value='". $row['courseTitle'] . "'>";
    echo "<input type='hidden' name='student' value='". $row['childFName'] . " " . $row['childLName'] . "'>";
    echo "<input type='hidden' name='bookingID' value='". $row['bookingID'] . "'>";
             echo "<button type='submit' class='w3-button w3-light-grey w3-block'>Add to Timetable</a>";
    echo "</td>";
    echo "</form>";

  }

  echo "</table>";
  echo "</ul>";
} else {
  echo "<h2>There are no bookings</h2>";
}

mysqli_close($conn);
?>
</div>
</div>
<?php include_once "footer.php";?>
</body></html>