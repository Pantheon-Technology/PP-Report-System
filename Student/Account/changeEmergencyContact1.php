<?php 
include_once "../../MenusAndFooter/parentMenu.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `parents` SET `emergencyName1` = ?, `relation1` = ?, `emergencyPostcode1` = ?, `emergencyContactNum1` = ? WHERE parentUsername = '$username'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_relation, $param_postcode, $param_phoneNum);
            $param_phoneNum = trim($_POST["phoneNum"]);
            $param_name = trim($_POST['name']);
            $param_relation = trim($_POST["relation"]);
            $param_postcode = trim($_POST["postcode"]);
            
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("' . $username . " " . ' first emergency contact details has been updated successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
 ?>
      <h1>Change your First Emergency Contact Details</h1>
      <p>Use the form below to change your emergency contact information.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Contacts Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" auto_complete="no" placeholder="Contacts Phone Number" required name="phoneNum"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Contacts Postcode" required name="postcode"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Contacts relation to child" required name="relation"></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>