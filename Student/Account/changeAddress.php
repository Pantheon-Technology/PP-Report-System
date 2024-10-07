<?php 
include_once "../../MenusAndFooter/parentMenu.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `parents` SET `addressLine1` = ?, `addressLine2` = ?, `city` = ?, `postcode` = ? WHERE parentUsername = '$username'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssss", $param_addrLine1, $param_addrLine2, $param_city, $param_postcode);
            $param_addrLine1 = trim($_POST["addrLine1"]);
            $param_addrLine2 = trim($_POST["addrLine2"]);
            $param_city = trim($_POST["city"]);
            $param_postcode = trim($_POST["postcode"]);
            
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("' . $username . " " . ' address has been updated successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
 ?>
      <h1>Change your address</h1>
      <p>Use the form below to change your address.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Address Line 1" required name="addrLine1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Adress Line 2" required name="addrLine2"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="City" required name="city"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Postcode" required name="postcode"></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>