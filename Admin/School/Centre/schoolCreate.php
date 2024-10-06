<?php 
include_once "../../../MenusAndFooter/NewMenuAdmin.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
      } else {
        $sql = "SELECT schoolID FROM school WHERE schoolName = ?";
          if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
              $param_username = trim($_POST["username"]);
                if (mysqli_stmt_execute($stmt)) {
                  mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                      $username_err = "This school is already in the system. Please contact system admin";
                        } else {
                          $username = trim($_POST["username"]);
                            } } else {
                                echo "Oops! Something went wrong. Please try again later.";
                                  }
                                    mysqli_stmt_close($stmt);}}
    
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
        $confirm_password_err = "Password did not match.";}}
    
if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
  $sql = "INSERT INTO school (`schoolName`, `authority`, `authorityName`, `password`, `contactName`, `contactEmail`, `contactNumber`, `financeName`, `financeEmail`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($stmt, "sssssssss", $param_schoolName, $param_authority, $param_authorityName, $param_password, $param_contactName, $param_contactEmail, $param_contactNumber, $param_financeName, $param_financeEmail);
        $param_schoolName = trim($_POST["username"]);
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_authority = trim($_POST['auth']);
        $param_authorityName = trim($_POST['authName']);
        $param_contactName = trim($_POST['contName']);
        $param_contactEmail = trim($_POST['contEmail']);
        $param_contactNumber = trim($_POST['contNum']);
        $param_financeName = trim($_POST['finName']);
        $param_financeEmail = trim($_POST['finEmail']);


           if (mysqli_stmt_execute($stmt)) {
             echo '<script>alert("' . $username . " " . 'added successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                 mysqli_stmt_close($stmt);
                }}
        mysqli_close($conn);
    } ?>
      <h1>School Create</h1>
      <p>Use the form below to add a school to your system.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="School Name" required name="username"></p>
      <?php echo (! empty($username_err)) ? 'is-invalid' : ''; ?>
                <span class="invalid-feedback">
                <?php echo $username_err;?></span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Password" required name="password"></p>
      <?php echo (! empty($password_err)) ? 'is-invalid' : ''; ?>
                <span class="invalid-feedback">
                <?php echo $password_err; ?>
                </span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Re-enter Password" required name="confirm_password"></p>
      <?php echo (! empty($confirm_password_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $confirm_password_err;?>
                </span>

                <label for="auth">Authority Type</label>
            <select id="auth" name="auth">
                <option value="Local Education Authority">Local Education Authority</option>
                <option value="Academy Trust">Academy Trust</option>
            </select>

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Name of Authority" required name="authName"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Name of School Contact" required name="contName"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="email" auto_complete="no" placeholder="Contact Email" required name="contEmail"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="number" auto_complete="no" placeholder="Contact Number" required name="contNum"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Name of Finance Contact" required name="finName"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="email" auto_complete="no" placeholder="Finance Contact Email" required name="finEmail"></p>

      <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
    </form>
    </div>
  </div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>