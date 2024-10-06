<?php 
include_once "../../../MenusAndFooter/NewMenuAdmin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("INSERT INTO `timeTable` (`subject`, `teacher`, `link`, `date`, `time`, `desc`, `studentList`, `additionalComments`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error in preparing the SQL query: " . $conn->error);
    }

    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $link = $_POST['link'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['desc'];
    $studentList = $_POST['studentList'];
    $additionalComments= $_POST['additionalComments'];

    $stmt->bind_param("ssssssss", $subject, $teacher, $link, $date, $time, $description, $studentList, $additionalComments);

    if ($stmt->execute()) {
        echo '<script>alert("Timetable has been updated!")</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>
<h1>Add to Time Table</h1>
<p>Use the form below to add a new event to the teacher timetable.</p>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Class Subject*" required name="subject"></p>
            
      <?php
          $query = "SELECT * FROM `teacher` ORDER BY `teacherUsername` ASC";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<p>" . "<b>" . "Teacher Username" . "</b>" . "</p>";
    echo '<select name="teacher">';
    echo '<option>' . "select" . '</option>';

    while ($row = mysqli_fetch_assoc($result)) {

        $value = $row['teacherUsername']; 

        echo '<option value="' . $value . ' ">' . $value . '</option>';
    }

    echo '</select>';
    mysqli_free_result($result);
} else {
    echo 'Error: ' . mysqli_error($connection);
}   
?>
          
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Zoom Link" required name="link"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="date" auto_complete="no" required name="date"></p>

      <p><input class="w3-input w3-padding-16 w3-border" type="time" auto_complete="no" required name="time"></p>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Description" name="desc"></textarea></p>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="List of Students Expected to Attend" name="studentList"></textarea></p>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Additional Comments" name="additionalComments"></textarea></p>
           
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
     </form>
</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>