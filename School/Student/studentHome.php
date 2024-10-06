<?php include_once "../../MenusAndFooter/studentMenu.php"; 
?>
      <h1>Student Home Page</h1>
      <h3>Welcome <?php echo $username ?></h3>
      
  <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    
  <a href="studentViewReport.php"><div class="w3-quarter w3-green w3-round">
      <h2><i class="fa fa-paperclip"></i></h2>
      <p>View Reports</p>
    </div>
    </a>

  <a href="studentDetails.php"><div class="w3-quarter w3-yellow w3-margin-left w3-round">
      <h2><i class="fa fa-user"></i></h2>
      <p>View Account</p>
    </div>
    </a>
    </div>
    
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>