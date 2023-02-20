<?php session_start();
include_once 'config.php';
$username = $password = "";
$username_err = $password_err = $login_err = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["uname"]))) {
      $username_err = "Please enter a username.";
    } else {
      $username = trim($_POST["uname"]);
    }
    if (empty(trim($_POST["psw"]))) {
      $password_err = "Please enter your password.";
    } else {
      $password = trim($_POST["psw"]);
    }
    if (empty($username_err) && empty($password_err)) {
      $sql = "SELECT `adminUsername`, `password` FROM `admins` WHERE `adminUsername` = ?";
        if ($stmt = mysqli_prepare($conn, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
        if (mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
          if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $username, $hashed_password);
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                $_SESSION["loggedInAdmin"] = true;
                $_SESSION["adminUsername"] = $username;
                header("location: adminHome.php");
              } else {
                $login_err = "Invalid username or password.";
              }
            }
          } else {
            $login_err = "Invalid username or password.";
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
      }
    }
    mysqli_close($conn);
  } require_once "mainMenu.php"; ?>

      <?php
      if (!empty($login_err)) {
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }
      ?>
      <h1>Admin Login</h1>
      <form method="post">
        <p><b>Username</b></p>
        <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $username; ?>"><br><br>
        <?php echo (!empty($username_err)) ? 'is-invalid' : '';?>
        <span class="invalid-feedback"><?php echo $username_err; ?></span>
        <p><b>Password</b></p>
        <input type="password" placeholder="Enter Password" name="psw"></br></br>
        <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
        <button type="submit">Login</button>
      </form> 
    </div>
  </div>

<?php include_once "frontend/footer.php" ?>
</body>

</html>