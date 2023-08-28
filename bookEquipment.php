<?php
include_once "teacherMenu.php";
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $target_dir = "photocopy/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file = "";

  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $file = htmlspecialchars( $reportUpload);

    $sql = "INSERT INTO `equipmentRequest` (`equipment`, `startDate`, `startTime`, `endDate`, `endTime`, `teacher`, `photocopy`) VALUES (?, ?, ?, ?,?,?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
      mysqli_stmt_bind_param($stmt, "sssssss", $param_equipment, $param_startDate, $param_startTime, $param_endDate, $param_endTime, $param_teacher, $param_file);
      $param_equipment = $_POST["equipment"];
      $param_startDate = $_POST["startDate"];
      $param_startTime = $_POST["startTime"]; 
      $param_endDate = $_POST["endDate"];
      $param_endTime = $_POST["endTime"];
      $param_teacher = $username;  
      $param_file = trim($file); 
         
             if (mysqli_stmt_execute($stmt)) {
               echo '<script>alert("Request has been sent")</script>';
             } else {
                 echo "Oops! Something went wrong. Please try again later.";
             }
             mysqli_stmt_close($stmt);
         }
      mysqli_close($conn);
       }
?>
<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Book Equipment</h1>

    <p>Use the form below to book equipment</p>
      <div class="w3-left-align w3-padding-large">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <label for="equipment" required>Equipment:*</label>
            <select id="equipment" name="equipment" class='w3-input w3-round'>
                <option value="Select">Select</option>
                <option value="Laptop">Laptop</option>
                <option value="Computer">Computer</option>
                <option value="Phone">Phone</option>
                <option value="Projector">Projector</option>
                <option value="Photocopy">Photocopy Request</option>
            </select>
          <p>If submitting a photocopy request, please upload the file below</p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <p>Start Date:*</p>
          <p><input class='w3-input w3-round' type="date" required name='startDate'></p>
          <p>Start Time:*</p>
          <p><input class='w3-input w3-round' type="time" required name='startTime'></p>
          <p>End Date:*</p>
          <p><input class='w3-input w3-round' type="date" required name='endDate'></p>
          <p>End Time:*</p>
          <p><input class='w3-input w3-round' type="time" required name='endTime'></p>
          
          <button class="w3-button w3-black w3-margin-bottom" type="submit" required>Submit Request</button>
        </form> 
        </div>
     </div>
   </div>
 </div>


<br>
</div>
<?php include_once "footer.php" ?>
</body>
</html>
