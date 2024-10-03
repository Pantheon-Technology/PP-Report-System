<?php 
include_once "NewMenuAdmin.php";
include_once 'config.php';
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "INSERT INTO `followUp` (`relatedId`, `followUpDetail`, `followedUpBy`) VALUES (?, ?, ?)";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                 mysqli_stmt_bind_param($stmt, "iss", $param_relatedId, $param_followUp, $param_whoFollowedUp);
                    $param_relatedId = $id;
                    $param_followUp = trim($_POST["followUp"]);
                    $param_whoFollowedUp = trim($_POST['name']);
                    
                        if (mysqli_stmt_execute($stmt)) {
                            echo '<script>alert("Follow up added to Incident No.' . $id . ' has been updated successfully")</script>';
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_stmt_close($stmt);
                    }
                } mysqli_close($conn);
            }
 ?>
      <h1>Add Follow up Details</h1>
      <p>Use the form below to Add to the follow up information.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Follow Up" required name="followUp"></textarea></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Member of Staff" required name="name"></p>
      
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Add follow up details</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
      <p><a class="w3-button w3-black w3-block" href ="javascript:history.back()">Back</a></p>
    </form>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>