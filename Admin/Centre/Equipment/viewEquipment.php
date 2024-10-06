<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql1 = "UPDATE `equipmentRequest` SET `granted` = 1 WHERE `requestID` = ?";
    if ($stmt = mysqli_prepare($conn, $sql1)) {
        mysqli_stmt_bind_param($stmt, "s", $param_id);
        $param_id = $_POST['id'];
           if (mysqli_stmt_execute($stmt)) {
               echo '<script>alert("Equipment Granted")</script>';

           } else {
               echo "Oops! Something went wrong. Please try again later.";
           } mysqli_stmt_close($stmt);
       }
   }


?>
      <h1>View Equipment Request</h1>

      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
$sql = "SELECT * FROM `equipmentRequest` WHERE `granted` = 0 ORDER BY `startDate` DESC";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
  echo "<table class='w3-green w3-border'>";
  echo "<tr>";
  echo "<th class='w3-border w3-padding'><h3>Start Date</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Start Time</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>End Date</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>End Time</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Equipment</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>File for Photocopy</h3></th>";
  echo "<th class='w3-border w3-padding'><h3>Teacher</h3>";
  echo "<th class='w3-border w3-padding'><h3>Grant Equipment</h3></th>";
  echo "</tr>";
while($row = $result->fetch_assoc()){   

   $year = substr($row["startDate"], 0, 4);
   $month = substr($row['startDate'], 5, -3);
   $day = substr($row['startDate'], 8, 10);

   $year1 = substr($row["endDate"], 0, 4);
   $month1 = substr($row['endDate'], 5, -3);
   $day1 = substr($row['endDate'], 8, 10);

    echo "<tr>";
    echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
    echo "<td class='w3-border'>" . $row['startTime'] . "</td>";
    echo "<td class='w3-border'>" . $day1 . "-" . $month1 . "-" . $year1 . "</td>";
    echo "<td class='w3-border'>". $row['endTime']. "</td>";
    echo "<td class='w3-border'>" . $row['equipment'] . "</td>";
    echo "<td class='w3-border'><a href='../../../photocopy/". $row['photocopy']. "' download>" . $row['photocopy'] . "</td>";
    echo "<td class='w3-border'>". $row['teacher']. "</td>";
    echo "<td class='w3-border'>";
    echo "<form class='w3-center' method='POST' action=''>";
             echo "<p><button type='submit' name='id' value=" . $row['requestID'] . ">Grant Permission</button></p>";
             echo "</form>";
    echo "</td>";
}
echo "</table>";
}else{
 echo "<h2>No Equipment Requests have been made</h2>";
}

?>
</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>
