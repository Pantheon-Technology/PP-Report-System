<?php 
require_once "schoolMenuLoggedIn.php";
require_once "config.php";
?>
<html>
<h1>Reports for <?php echo $username ?></h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">

<?php 
$sql = "SELECT * FROM `schoolStudentFiles` WHERE `school` = '$username' ORDER BY `date` DESC";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){   
            echo "<a href =\"Student_Individual_Upload.php?id=". $row['fileName'] . "&name=" . $row['studentUsername'] . "\"><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
      echo "<h2><i class='fa fa-eye'></i></h2>";
      echo "<p>View " . $row['fileName'] . " for " . $row['studentUsername'] . "</p>";
      echo "</div>";
      echo "</a>";
      }
}else{
 echo "<h2>" . "There are no reports for $username right now" . "</h2>";
}
$conn->close();
?>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>

</div>
<?php include_once "footer.php" ?>
</body>
</html> 