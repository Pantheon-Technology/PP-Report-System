<?php
session_start();
if(!isset($_SESSION["loggedInAdmin"]) || $_SESSION["loggedInAdmin"] !== true){
  header("location: adminLogin.php");
  exit;
}
$username = $_SESSION['adminUsername'];
?>
<html>
<?php include_once "adminMenu.php"; ?>
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Admin Home Page</h1>
      <h3>Welcome <?php echo $username; ?></h3>
      <div class="w3-padding-64">
      <a href="teacherAccountCreate.php" class="w3-button w3-black w3-block w3-hover-brown w3-padding-16">Create New Teacher</a>
      <a href="parentAccountCreate.php" class="w3-button w3-black w3-block w3-hover-teal w3-padding-16">Create New Parent</a>
      <a href="adminAccountCreate.php" class="w3-button w3-black w3-block w3-hover-white w3-padding-16">Create New Admin</a>
      <a href="teacherAccountRemove.php" class="w3-button w3-black w3-block w3-hover-red w3-padding-16">Remove Teacher</a>
      <a href="parentAccountRemove.php" class="w3-button w3-black w3-block w3-hover-red w3-padding-16">Remove Parent</a>
      <a href="logOut.php" class="w3-button w3-black w3-block w3-hover-dark-grey w3-padding-16">Logout</a>
      </div>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>