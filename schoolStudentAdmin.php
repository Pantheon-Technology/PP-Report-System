<?php
require_once "NewMenuAdmin.php";
require_once "config.php";
if (isset($_GET['studentid'])) {
    $id = $_SESSION["studentid"] = $_GET['studentid'];
} else {
    $id = $_SESSION["studentid"];
}

?>
</html>
<body>
      <h1><?php echo "Student" . " details"; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM schoolStudent where studentID = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<h2>" . "General Details" . "</h2>";
              echo "<div class=w3-half>";
                echo "<p>" . "Unique ID: " . $row['studentID'] . " Username: " . $row['studentUsername'] . "</p>";
                echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
                echo "<p>" . "School: " . $row['schoolName'] . "</p>";
                echo "<p>" . "School Year: " . $row['schoolYear'] . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Classes" . "</h2>" . "</p>";
                echo "<p>" . "Class 1: " . $row['subject1'] . "</p>";
                echo "<p>" . "Class 2: " . $row['subject2'] . "</p>";
                echo "<p>" . "Class 3: " . $row['subject3'] . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Additional Information" . "</h2>" . "</p>";
                echo "<p>" . "S.E.N.D Information: " . "</p>";
                echo "<p>" . $row['SEND'] . "</p>";
                echo "<p>" . "E.H.C.P Information: " . "</p>";
                echo "<p>" . $row['EHCP'] . "</p>";
                echo "<p>" . "Allocated Tutor: " . $row['allocatedTutor'] . "</p>";
                echo "</div>";

                $_SESSION['thisStudent'] = $row['studentUsername'];
                
              }
        }

        echo "<div class=w3-half>";
        echo "<h2>" . "Student Uploads" . "</h2>";

        $student = $_SESSION['thisStudent'];

        $sql1 = "SELECT * FROM `schoolStudentFiles` where `studentUsername` = '$student' ORDER BY `date` DESC LIMIT 10 ";

        $result = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $filePath = "uploads\\" . $row['file']; 
                echo "<div>" . "<a href=" . $filePath ." download>" . "Download" . " " . $row['studentUsername'] . "'s" . " " . $row['fileName'] . "</a>" . "</div>";
              }
        }else{
            echo "No uploads";
        }
        echo "</div>";
      

        ?>
      </div>
    </div>
  </div>
  <?php include_once "footer.php"; ?>
</body>
</html>