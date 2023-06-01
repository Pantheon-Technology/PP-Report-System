<?php
session_start();
$target_dir = "schoolUploads/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "config.php";
$child = $_POST["childName"];
$documentName = $_POST["reportName"];
$file = "";
$teacherUpload = $_SESSION['teacherUsername'];

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

$sql = "SELECT `studentUsername`FROM `schoolStudent` WHERE `studentUsername` = ?";
  if ($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $child;
      if (mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 0) {
       $uploadOk = 0; 
       echo "The Username " . "<b>" . $child . "</b>" . " does not exist!";
        }
      }
    }

if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else {
  $sql = "INSERT INTO `schoolStudentFiles` (`studentUsername`, `fileName`, `file`, `teacher`, `school`) VALUES (?, ?, ?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "sssss", $param_user, $param_fileName, $param_fileToUpload, $param_teacher, $param_school);
         $param_user = $child;
         $param_fileName = $documentName;
         $param_fileToUpload = htmlspecialchars( $reportUpload);
         $param_teacher = $teacherUpload;
         $param_school = trim($_POST['school']);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  echo '<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="studentFileUpload.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
