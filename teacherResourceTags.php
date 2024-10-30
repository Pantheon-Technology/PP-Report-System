<?php
include_once "teacherMenu.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}
$sql = "SELECT `Tag1`, `Tag2`, `Tag3`, `Tag4`, `Tag5` FROM  `resourcePack` WHERE Id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){  
    $tag1 = $row['Tag1'];
    $tag2 = $row['Tag2'];
    $tag3 = $row['Tag3'];
    $tag4 = $row['Tag4'];
    $tag5 = $row['Tag5'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql1 = "UPDATE `resourcePack` SET `Tag1` = ? , `Tag2` = ?, `Tag3` = ?, `Tag4` = ?, `Tag5` = ? WHERE Id = '$id'";
    if ($stmt = mysqli_prepare($conn, $sql1)) {
        echo "hello";
     mysqli_stmt_bind_param($stmt, "sssss", $t1, $t2, $t3, $t4, $t5);
        $t1 = trim($_POST["tag1"]);
        $t2 = trim($_POST["tag2"]);
        $t3 = trim($_POST["tag3"]);
        $t4 = trim($_POST["tag4"]);
        $t5 = trim($_POST["tag5"]);
        
            if (mysqli_stmt_execute($stmt)) {
                echo'<script>alert("tags uploaded successfully");document.location="teacherResource.php?id=' . $id . '"</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    } mysqli_close($conn);
?>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
  <h1>Change the Tags</h1>
  <p>Use the form below to change the tags.</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <p><b>Tags</b></p>
            <label for="tag1">Tag 1:</label>
            <input class="w3-input w3-padding-16 w3-border" type="text" name="tag1" id="tag1" maxlength="30" value ="<?php echo $tag1 ?>">
            <label for="tag2">Tag 2:</label>
            <input class="w3-input w3-padding-16 w3-border" type="text" name="tag2" id="tag2" maxlength="30" value ="<?php echo $tag2 ?>">
            <label for="tag3">Tag 3:</label>
            <input class="w3-input w3-padding-16 w3-border" type="text" name="tag3" id="tag3" maxlength="30" value ="<?php echo $tag3 ?>">
            <label for="tag4">Tag 4:</label>
            <input class="w3-input w3-padding-16 w3-border" type="text" name="tag4" id="tag4" maxlength="30" value ="<?php echo $tag4 ?>">
            <label for="tag5">Tag 5:</label>
            <input class="w3-input w3-padding-16 w3-border" type="text" name="tag5" id="tag5" maxlength="30" value ="<?php echo $tag5 ?>">
  <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
  <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
</form>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>