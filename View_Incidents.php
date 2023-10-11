<?php include_once "NewMenuAdmin.php";
require_once "config.php";
?>
<html>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    
<h1>Recent Incidents</h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
$sql = "SELECT * FROM `incidents` ORDER BY `incidentNumber` DESC LIMIT 20";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
    echo "<a href =\"incident.php?id=". $row['incidentNumber'] . "\"><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
    echo "<h2><i class='fa fa-eye'></i></h2>";
    echo "<p>" . "View details of Incident Involving " . $row['studentName'] . " " . "Submitted by " . $row['reportedBy'] .  "</p>";
    echo "</div>";
    echo "</a>";
}}
else{
 echo "<h2>" . "There are no incidents." . "</h2>";
}
$conn->close();
?>
</div>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>