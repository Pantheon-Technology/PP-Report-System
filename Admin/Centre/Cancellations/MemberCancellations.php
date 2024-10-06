<?php
require_once "../../../MenusAndFooter/NewMenuAdmin.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql1 = "DELETE FROM `cancellations` WHERE cancellationID = ?";
        if ($stmt = mysqli_prepare($conn, $sql1)) {
         mysqli_stmt_bind_param($stmt, "s", $param_id);
         $param_id = $id;
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Change Request Removed Successfully")</script>';
                header("location: adminViewCancellations.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            } mysqli_stmt_close($stmt);
        }
    }
?>
</html>
<body>
      <h1><?php echo "Cancellation No." . $id; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM `cancellations` where `cancellationID` = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
              echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
              echo "<p>" . "<b>" . "Comments:" . "</b>" . "</p>";
              echo "<p>" . $row['comments'] . "</p>";
              echo "<p>" . "Date of Request: " . $row['date'] . "</p>";
              echo "</div>";

              echo "<form method='POST' action=''>";
              echo "<p><button type='submit'>Mark Request as complete</button></p>";
              echo "</form>";
              
              }
        }else{
            echo "0 results";
        }
        ?>
      </div>
    </div>
  </div>
  <?php include_once "../../../MenusAndFooter/footer.php"; ?>
</body>
</html>