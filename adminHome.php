<html>
<?php include_once "adminMenu.php"; ?>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Admin Home Page</h1>
      <h3>Welcome <?php echo $username; ?></h3>
      <div class="w3-padding-64">
      <a href="parentSearchAdmin.php" class="w3-button w3-white w3-block w3-hover-blue w3-padding-16">View Students</a>
      <a href="teacherAccountCreate.php" class="w3-button w3-white w3-block w3-hover-brown w3-padding-16">Create New Teacher</a>
      <a href="adminAccountCreate.php" class="w3-button w3-white w3-block w3-hover-black w3-padding-16">Create New Admin</a>
      <a href="teacherAccountRemove.php" class="w3-button w3-white w3-block w3-hover-red w3-padding-16">Remove Teacher</a>
      <a href="parentAccountRemove.php" class="w3-button w3-white w3-block w3-hover-red w3-padding-16">Remove Parent</a>
      <a href="parentPasswordReset.php" class="w3-button w3-white w3-block w3-hover-yellow w3-padding-16">Parent Password Reset</a>
      <a href="teacherPasswordReset.php" class="w3-button w3-white w3-block w3-hover-green w3-padding-16">Teacher Password Reset</a>
      </div>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>