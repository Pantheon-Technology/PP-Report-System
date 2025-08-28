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
<p><a href ='adminViewSchoolStudent.php.php'><- back</a></p>
      <h1><?php echo "Student" . " details"; ?></h1>
      <p><a href ='editSchoolStudentAdmin.php?studentid=<?php echo $id ?>' class="w3-button w3-light-grey">Edit Student details</a></p>
      <div>
        <?php
        $sql = "SELECT * FROM schoolStudent where studentID = $id ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){

              $year = substr($row['DOB'], 0, 4);
                $month = substr($row['DOB'], 5, -3);
                $day = substr($row['DOB'], 8, 10);
              $formattedDate = $day . '/' . $month . '/' . $year;

              echo "<h2>" . "General Details" . "</h2>";
              echo "<div class=w3-half>";
                echo "<p>" . "Unique ID: " . $row['studentID'] . " Username: " . $row['studentUsername'] . "</p>";
                echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
                echo "<p>" . "School: " . $row['schoolName'] . "</p>";
                echo "<p>" . "School Year: " . $row['schoolYear'] . "</p>";
                echo "<p>" . "D.O.B: " . $formattedDate . "</p>";
                echo "<p>" . "Mobile: " . $row['Mobile'] . "</p>";
                echo "<p>" . "Email: " . $row['Email'] . "</p>";
                echo "<p>" . "Address Line 1: " . $row['AddressLine1'] . "</p>";
                echo "<p>" . "Address Line 2: " . $row['AddressLine2'] . "</p>";
                echo "<p>" . "Post Code: " . $row['PostCode'] . "</p>";
                if($row['live_student_learning_log'] !== ''){
                  echo "<p><a href='" . $row['live_student_learning_log'] . "'>Live learning logs</a></p>";
                  }
                echo "</div>";

                echo "<h2>" . "Emergency Contact 1" . "</h2>";
                echo "<div class=w3-half>";
                  echo "<p>" . "Name: " . $row['EmergencyContactName1'] . "</p>";
                  echo "<p>" . "Relationship to Child: " . $row['EmergencyContactRelationship1'] . "</p>";
                  echo "<p>" . "Phone: " . $row['EmergencyContactPhone1'] . "</p>";
                  echo "</div>";

                  echo "<h2>" . "Emergency Contact 2" . "</h2>";
                echo "<div class=w3-half>";
                  echo "<p>" . "Name: " . $row['EmergencyContactName2'] . "</p>";
                  echo "<p>" . "Relationship to Child: " . $row['EmergencyContactRelationship2'] . "</p>";
                  echo "<p>" . "Phone: " . $row['EmergencyContactPhone2'] . "</p>";
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

                echo "<p>" . "Notes: " . "</p>";
                echo "<p>". $row['AdditionalInformation']. "</p>";

                echo "</div>";

                $_SESSION['thisStudent'] = $row['studentUsername'];
                
              }
        }

        echo "<div class='w3-half'>";
        echo "<h2>" . "Recent Upload" . "</h2>";

        $student = $_SESSION['thisStudent'];

        $sql1 = "SELECT * FROM `schoolStudentFiles` where `studentUsername` = '$student' ORDER BY `date` DESC LIMIT 1 ";

        $result = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<a href =\"admin_view_school.php?id=". $row['fileName'] . "&name=" . $row['studentUsername'] . "\"><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
              echo "<h2><i class='fa fa-eye'></i></h2>";
              echo "<p>View " . $row['fileName'] . " for " . $row['studentUsername'] . "</p>";
              echo "</div>";
              echo "</a>";}
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