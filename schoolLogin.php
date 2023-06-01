<?php include_once 'schoolMenu.php';?>
<?php 
session_start();
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
      $sql = "SELECT schoolName, password FROM school WHERE schoolName = ?";
      if ($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
          if (mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
              mysqli_stmt_bind_result($stmt, $username, $hashed_password);
              if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                $_SESSION["loggedInSchool"] = true;
                $_SESSION["centerUsername"] = $username;
                header("location: schoolDashboard.php");
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
      <h1>Center Login</h1>
      <p>Use the form below to access your center dashboard.</p>
      <form method="post">
        <p><b>Center Name</b></p>
        <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $username; ?>"><br><br>
        <span class="invalid-feedback"></span>
        <p><b>Password</b></p>
        <input type="password" placeholder="Enter Password" name="psw"></br></br>
        <span class="invalid-feedback"></span>
        <button type="submit">Login</button>
        <?php echo "<p>" . $username_err . "</p>";?>
        <?php echo "<p>" . $password_err . "</p>"; ?>
        <?php echo "<p>" . $login_err . "</p>"; ?>
      </form>
    </div>
  </div>
<?php
 include_once "footer.php" ?>
</body>
</html>