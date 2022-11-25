<?php 
session_start();
if(!isset($_SESSION["loggedInParent"]) || $_SESSION["loggedInParent"] !== true){
  header("location: parentLogin.php");
  exit;
}
require_once "config.php";
$username = $_SESSION["parentUsername"]; ?>
<html>
<div class="w3-row">
  <div class="w3-half w3-black w3-container w3-center" style="height:700px">
    <div class="w3-padding-64">
      <h1>Positive Progress</h1>
    </div>
    <div class="w3-padding-64">
      <a href="index.php" class="w3-button w3-black w3-block w3-hover-blue-grey w3-padding-16">Home</a>
      <a href="logOut.php" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">Logout</a>
    </div>
  </div>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Reports for <?php echo $username ?></h1>
      <?php 

$sql = "SELECT * FROM `reportUpload` WHERE parentUsername = '$username'";
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
  </div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>