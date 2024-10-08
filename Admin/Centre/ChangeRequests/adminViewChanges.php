<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php"; ?>
      
<h1>Class Change Requests</h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
        
<?php 
$sql = "SELECT * FROM `changeRequests` where `archived` = 0 ORDER BY `date` ASC Limit 20";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
    echo "<a href =\"Requests.php?id=". $row['requestID'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
    echo "<h2><i class='fa fa-eye'></i></h2>";
    echo "<p>" . "View Change Request for: " . $row['studentName'] . "</p>";
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
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>
