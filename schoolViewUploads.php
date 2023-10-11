<?php include_once "schoolMenuLoggedIn.php";
require_once "config.php";
?>
<html>
<h1>Recent Uploads</h1>
<?php 
$sql = "SELECT * FROM `schoolStudentFiles` WHERE `school` = '$username' ORDER BY `date` DESC LIMIT 20";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
$filePath = "schoolUploads\\" . $row['file']; 
echo "<div>" . "<a href=" . $filePath ." download>" . "Download" . " " . $row['studentUsername'] . "'s" . " " . $row['fileName'] . " " . "uploaded by" . " " . $row['teacher'] . "</a>" . "</div>";
}}
else{
 echo "<h2>" . "There are no reports right now" . "</h2>";
}
$conn->close();
?>

</div>
<?php include_once "footer.php" ?>
</body>
</html> 