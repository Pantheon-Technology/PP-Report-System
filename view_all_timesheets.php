<?php include_once "NewMenuAdmin.php"; 
include_once "config.php";
?>
      <h1>Timesheets</h1>
      <p>Click on a teachers account to view their timesheets</p>
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
$sql = "SELECT * FROM `teacher`";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
    echo "<a href =\"teacherTimesheet.php?id=". $row['teacherUsername'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
    echo "<h2><i class='fa fa-eye'></i></h2>";
    echo "<p>" . "View Timesheets for: " . $row['teacherUsername'] . "</p>";
    echo "</div>";
    echo "</a>";
}}
else{
 echo "<h2>" . "There are no change requests right now" . "</h2>";
}
$conn->close();
?>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>
