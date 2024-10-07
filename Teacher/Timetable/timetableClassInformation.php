<?php
require_once "../../MenusAndFooter/teacherMenu.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
?>
      <h2>Class Information</h2>
      <div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">
        <?php
        $sql = "SELECT * FROM `timeTable` where classID = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){

                $year = substr($row["date"], 0, 4);
                $month = substr($row['date'], 5, -3);
                $day = substr($row['date'], 8, 10);
              echo "<div class=w3-half>";
              echo "<p><h3>" . "Subject: " . $row['subject'] . "</h3></p>";
              echo "<p>" . "<a target='_blank' href=" . $row['link'] . ">" . "Zoom Link" . "</a>" .  "</p>";
              echo "<p>" . "Date of Class: " . $day . "/" . $month . "/" . $year . "</p>";
              echo "<p>" . "Class Time: " . $row['time'] . "</p>";
              echo "<p>" . "<b>" . "Description:" . "</b>" . "</p>";
              echo "<p>" . $row['desc'] . "</p>";
              echo "<p>" . "<b>" . "Students Expected to Attend:" . "</b>" . "</p>";
              echo "<p>" . $row['studentList'] . "</p>";
              echo "<p>" . "<b>" . "Additional Comments:" . "</b>" . "</p>";
              echo "<p>" . $row['additionalComments'] . "</p>";
              }
        }else{
            echo "0 results";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  </div>
  <?php include_once "../../MenusAndFooter/footer.php"; ?>
</body>
</html>