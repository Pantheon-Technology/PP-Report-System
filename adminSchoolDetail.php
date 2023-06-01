<?php
require_once "NewMenuAdmin.php";
require_once "config.php";
if (isset($_GET['schoolid'])) {
    $id = $_SESSION["schoolid"] = $_GET['schoolid'];
} else {
    $id = $_SESSION["schoolid"];
}
?>
</html>
<body>
      <h1><?php echo "School Details"; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM school where schoolID = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
              echo "<p>" . "Unique ID: " . $row['schoolID'] . " School: " . $row['schoolName'] . "</p>";
              echo "<p>" . "Authority: " . $row['authority'] . "</p>";
              echo "<p>" . "Authority Name: " . $row['authorityName'] . "</p>";
              echo "<p>" . "Contact Name: " . $row['contactName'] . "</p>";
              echo "<p>" . "Contact Email: " . $row['contactEmail'] . "</p>";
              echo "<p>" . "Contact Number: " . $row['contactNumber'] . "</p>";
              echo "<p>" . "Finance Name:: " . $row['financeName'] . "</p>";
              echo "<p>" . "Finance Email: " . $row['financeEmail'] . "</p>";
              echo "</div>";

              }
        }else{
            echo "0 results";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  </div>
  <?php include_once "footer.php"; ?>
</body>
</html>