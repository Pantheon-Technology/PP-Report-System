<?php
session_start(); 
include_once "../../MenusAndFooter/studentMenu.php";
$username = $_SESSION['studentUsername'];

?>
      <h1>Account Information</h1>
      <div>
        <?php
        $sql = "SELECT * FROM `schoolStudent` WHERE `studentUsername` = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
                echo "<h2>" . "General Details" . "</h2>";
                echo "<p>" . "Unique ID: " . $row['studentID'] . " Username: " . $row['studentUsername'] . "</p>";
                echo "<p>" . "Student Name: " . $row['studentName'] . "</p>";
                echo "<p>" . "School: " . $row['schoolName'] . "</p>";
                echo "<p>" . "School Year: " . $row['schoolYear'] . "</p>";
                echo "<p>" . "Allocated Tutor: " . $row['allocatedTutor'] . "</p>";
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
<?php include_once "../../MenusAndFooter/footer.php"; ?>