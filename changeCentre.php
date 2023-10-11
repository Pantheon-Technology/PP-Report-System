<?php 
include_once "parentMenu.php";
include_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `parents` SET `site` = ? WHERE parentUsername = '$username'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "s", $param_site);
            $param_site = $_POST["site"];
            
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("' . $username . " " . ' record updated successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
 ?>
      <h1>Change your centre</h1>
      <p>Use the form below to change your centre.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

      <p>Which site are you/ will you be attending?*</p>
      <p><input type="radio" id="South Liverpool" required name="site" value="South Liverpool">
      <label for="South Liverpool">South Liverpool</label>
      <input type="radio" id="Widnes" required name="site" value="Widnes">
      <label for="Widnes">Widnes</label></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>