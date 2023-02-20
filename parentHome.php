<?php include_once "parentMenu.php"; 
?>
      <h1>Parent Home Page</h1>
      <h3>Welcome <?php echo $username; ?></h3>
      <a href="viewReport.php" class="w3-button w3-white w3-block w3-hover-brown w3-padding-16">View Reports</a>
      <a href="childDetails.php" class="w3-button w3-white w3-block w3-hover-teal w3-padding-16">View Account Details</a>
      <a href="parentUpload.php" class="w3-button w3-white w3-block w3-hover-black w3-padding-16">Legal</a>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>