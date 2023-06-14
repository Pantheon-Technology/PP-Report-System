<?php include_once "NewMenuAdmin.php"; 
include_once "config.php";
$totalHours = 0;
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql1 = "UPDATE timesheet SET `archived` = 1 WHERE employee_name = ?";
        if ($stmt = mysqli_prepare($conn, $sql1)) {
         mysqli_stmt_bind_param($stmt, "s", $param_id);
         $param_id = $id;
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Time Sheet Archived Successfully")</script>';
                header("location: view_all_timesheets.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            } mysqli_stmt_close($stmt);
        }
    }


?>
      <h1>Timesheet for <?php echo $id ?></h1>
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
  
<?php 
 $sql = "SELECT * FROM timesheet WHERE employee_name = '$id' AND archived = '0' AND hours_worked != '0' AND `date` != ' ' ORDER BY `weekCommencing` DESC";
 $result = mysqli_query($conn, $sql);
 if($result->num_rows > 0){
   echo "<table class='w3-green w3-border'>";
   echo "<tr>";
   echo "<th class='w3-border w3-padding'><h3>Week Commencing</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Date</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Hours Worked</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Premises</h3></th>";
   echo "</tr>";
 while($row = $result->fetch_assoc()){   

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

     $totalHours += $row['hours_worked'];
 }
 echo "</table>";
 echo "<h2>" . $id . " has worked " . $totalHours . " hours since you last archived." . "</h2>";
 echo "<form method='POST' action=''>";
              echo "<p><button type='submit'>Archive Timesheet</button></p>";
              echo "</form>";
}else{
  echo "<h2>" . "There are no timesheets for " . $id . "</h2>";
 }
mysqli_close($conn);
?>

      
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>
