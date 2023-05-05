<?php include_once "NewMenuAdmin.php";
require_once "config.php";
?>
<html>
<h1>Recent Incidents</h1>
<?php 
$sql = "SELECT * FROM `incidents` ORDER BY `incidentNumber` DESC LIMIT 20";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
    echo "<a href =\"incident.php?id=". $row['incidentNumber'] . "\">" . "View details of Incident No." . $row['incidentNumber'] . " " . "Submitted by " . $row['reportedBy'] . "</p>";
}}
else{
 echo "<h2>" . "There are no incidents." . "</h2>";
}
$conn->close();
?>

</div>
<?php include_once "footer.php" ?>
</body>
</html>