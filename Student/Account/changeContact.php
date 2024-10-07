<?php 
include_once "../../MenusAndFooter/parentMenu.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `parents` SET `phoneNum` = ?, `eMail` = ? WHERE parentUsername = '$username'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_phoneNum);
            $param_email = trim($_POST["email"]);
            $param_phoneNum = trim($_POST["phoneNum"]);
            
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
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Email" required name="email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" auto_complete="no" placeholder="Phone Num" required name="phoneNum"></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>