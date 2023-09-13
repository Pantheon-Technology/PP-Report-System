<?php
require_once "NewMenuAdmin.php";
require_once "config.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}

?>
</html>
<body>
      <h1><?php echo "Request No." . $id; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM changeRequests where requestID = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
              echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
              echo "<p>" . "Date of Original Session: " . $row['sessionDate'] . "</p>";
              echo "<p>" . "Time of Original Session: " . $row['sessionTime'] . "</p>";
              echo "<p>" . "Type of Request: " . $row['reason'] . "</p>";
              echo "<p>" . "<b>" . "Comments:" . "</b>" . "</p>";
              echo "<p>" . $row['comments'] . "</p>";
              echo "<p>" . "Date of Request: " . $row['date'] . "</p>";
              echo "</div>";
              
              }
        }else{
            echo "0 results";
        }
        ?>
      </div>
    </div>
  </div>
  <?php include_once "footer.php"; ?>
</body>
</html>