<?php 
include_once "adminMenu.php"; 
include_once 'config.php';
$username = "";
$username_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT teacherID FROM teacher WHERE teacherUsername = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = trim($_POST["username"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        $username_err = "This username does not exist. Please try another";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                } mysqli_stmt_close($stmt);
    }
    }
    if (empty($username_err)) {
    $sql = "DELETE FROM teacher WHERE teacherUsername = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "s", $param_username);
         $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("' . $username . " " . 'removed successfully")</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            } mysqli_stmt_close($stmt);
        }
    }mysqli_close($conn);
} ?>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Teacher Account REMOVE</h1>
      <p>Use the form below to REMOVE a new teacher from your system.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="username" required name="username"></p>
          <?php echo (! empty($username_err)) ? 'is-invalid' : '';?>
            <span class="invalid-feedback">
                <?php echo $username_err;?>
            </span>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Remove</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
      </form>
    </div>
   </div>
<?php include_once "footer.php" ?>
</body>
</html>