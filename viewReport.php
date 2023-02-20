<?php 
include_once "parentMenu.php";
require_once "config.php";
$username = $_SESSION["parentUsername"]; 
?>
<html>

      <h1>Reports for <?php echo $username ?></h1>
      <?php 

$sql = "SELECT * FROM `reportUpload` WHERE parentUsername = '$username' ORDER BY `uploadDate` DESC";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
$filePath = "uploads\\" . $row['file']; 
echo "<div>" . "<a href=" . $filePath ." download>" . "Download" . " " . $row['parentUsername'] . "'s" . " " . $row['fileName'] . "</a>" . "</div>";
}
}
else{
 echo "<h2>" . "There are no reports for $username right now" . "</h2>";
}
$conn->close();
?>

</div>
<?php include_once "footer.php" ?>
</body>
</html>