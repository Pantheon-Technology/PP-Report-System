<?php include_once "NewMenuAdmin.php";
require_once "config.php";
?>
<html>
<h1>Recent Uploads</h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
$sql = "SELECT * FROM `reportUpload` ORDER BY `date` DESC LIMIT 20";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
$filePath = "uploads\\" . $row['file']; 
            echo "<a href='$filePath' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['parentUsername'] . "'s" . " " . $row['fileName'] . "</p>";
            echo "</div>";
            echo "</a>";}}
else{
 echo "<h2>" . "There are no reports right now" . "</h2>";
}
$conn->close();
?>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>