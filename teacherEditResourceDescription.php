<?php
include_once "teacherMenu.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}
$sql = "SELECT `Description` FROM  `resourcePack` WHERE Id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){  
    $description = $row['Description'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "UPDATE `resourcePack` SET `Description` = ? WHERE Id = '$id'";
    if ($stmt = mysqli_prepare($conn, $sql)) {
     mysqli_stmt_bind_param($stmt, "s", $desc);
        $desc = trim($_POST["desc"]);
        
            if (mysqli_stmt_execute($stmt)) {
                echo'<script>alert("description uploaded successfully");document.location="teacherResource.php?id=' . $id . '"</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    } mysqli_close($conn);
?>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
  <h1>Change the description</h1>
  <p>Use the form below to change the description.</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <p><textarea class="w3-input w3-padding-16 w3-border" auto_complete="no" placeholder="<?php echo $description ?>" required name="desc"><?php echo $description ?></textarea></p>
  <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
  <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
</form>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>