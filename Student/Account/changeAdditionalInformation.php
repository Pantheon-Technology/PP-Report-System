<?php 
include_once "../../MenusAndFooter/parentMenu.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `parents` SET `additionalInfo` = ?, `SEN` = ? WHERE parentUsername = '$username'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ss", $param_I, $param_SEN);
            $param_I = $_POST["additionalInfo"];
            $param_SEN = $_POST["SEN"];
            
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("' . $username . " " . ' Contact details has been updated successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
 ?>

      <h1>Change your Contact Details</h1>
      <p>Use the form below to change your contact information.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Student Needs" required name="additionalInfo"></textarea></p>
      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Special Education Requirements" required name="SEN"></textarea></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>