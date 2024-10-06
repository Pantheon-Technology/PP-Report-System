<?php
include_once "../../../MenusAndFooter/NewMenuAdmin.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target_dir = "../../../CourseImg/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file = "";

if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} if ($uploadOk == 1) {

    $sql = "INSERT INTO `courseList` (`courseTitle`, `courseImage`, `courseDesc`, `learningObjectives`, `credits`) VALUES (?,?,?,?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {

      mysqli_stmt_bind_param($stmt, "sssss", $param_title, $param_fileToUpload, $param_desc, $param_lo, $param_credits);
      $param_title = $_POST["courseTitle"];
      $param_fileToUpload = htmlspecialchars( $reportUpload);
      $param_desc = $_POST["desc"];
      $param_lo = $_POST["learningOutcomes"];
      $param_credits = $_POST["credits"];
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
      echo '<script>alert("Course Created Successfully");document.location="addCourse.php"</script>';
            
            if (!(mysqli_stmt_execute($stmt))) {
              echo "Error: " . $sql . "<br>" . $conn->error;
             } mysqli_stmt_close($stmt);
         }
      mysqli_close($conn);
       }
    }
?>
<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Add A Purchasable Course</h1>

    <p>Use the form below to add a course to the course list</p>
      <div class="w3-left-align w3-padding-large">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <p>Course Title:*</p>
          <p><input class='w3-input w3-round' type="text" required name='courseTitle' placeholder="Course Title"></p>
          
          <p>Course Desc:*</p>
          <p><textarea class='w3-input w3-round' type="text" required name='desc' placeholder="Course Description"></textarea></p>

          <p>Learning Outcomes:*</p>
          <p><textarea class='w3-input w3-round' type="text" required name='learningOutcomes' placeholder="Learning Outcomes"></textarea></p>

          <p>Course Thumbnail:*</p>
          <p><input type="file" name="fileToUpload" id="fileToUpload"></p>

          <p>Credits for Course:*</p>
          <p><input class='w3-input w3-round' type="number" required name='credits' placeholder="Credits"></p>
          
          <button class="w3-button w3-black w3-margin-bottom" type="submit" required>Submit Request</button>
        </form> 
        </div>
     </div>
   </div>
 </div>


<br>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>
