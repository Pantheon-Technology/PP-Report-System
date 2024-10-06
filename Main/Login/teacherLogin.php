<?php 
require_once "../../MenusAndFooter/mainMenu.php";
include_once '../../Utilities/config.php';
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
  $sql = "SELECT `teacherUsername`, `password` FROM `teacher` WHERE `teacherUsername` = ?";
  if ($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
      if (mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $username, $hashed_password);
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["loggedInTeacher"] = true;
                $_SESSION["teacherUsername"] = $username;
                header("location: ../../Teacher/teacherHome.php");
                } else {
                  $login_err = "Invalid username or password.";
                }
            }
        } else {
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      } mysqli_stmt_close($stmt);
  }
} mysqli_close($conn);
}
 ?>
      <h1>Teacher Login Page</h1>
      <p>If you are a teacher, please use the login form below to access your account.</p>
      <?php
      if (!empty($login_err)) {
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }?>
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
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>