<?php 
include_once 'config.php';
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT teacherID FROM teachers WHERE teacherUsername = ?";   
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
if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }
if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
        } else {
           $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "UPDATE `teachers` SET `password` = ? WHERE teacherUsername = ? ";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_username);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("' . $username . " " . 'password has been updated successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
    }
 include_once "adminMenu.php"; ?>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Teacher update password</h1>
      <p>Use the form below to change a teacher password in your system.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="username" required name="username"></p>
      <?php echo (! empty($username_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $username_err;?>
                </span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Password" required name="password"></p>
      <?php echo (! empty($password_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $password_err;?>
                </span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Re-enter Password" required name="confirm_password"></p>
      <?php echo (! empty($confirm_password_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $confirm_password_err;?>
                </span>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
    </form>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>