<?php
session_start();
$target_dir = "schoolUploads/";
$child = $_POST["childName"];
$reportUpload = str_replace(" ", "", basename("file1" . $child . $_FILES["fileToUpload"]["name"]));
$reportUpload2 = str_replace(" ", "", basename("file2" . $child .$_FILES["fileToUpload2"]["name"]));
$reportUpload3 = str_replace(" ", "", basename("file3" . $child .$_FILES["fileToUpload3"]["name"]));
$reportUpload4 = str_replace(" ", "", basename("file4" . $child .$_FILES["fileToUpload4"]["name"]));
$reportUpload5 = str_replace(" ", "", basename("file5" . $child .$_FILES["fileToUpload5"]["name"]));


$target_file = $target_dir . $reportUpload;
$target_file2 = $target_dir . $reportUpload2;
$target_file3 = $target_dir . $reportUpload3;
$target_file4 = $target_dir . $reportUpload4;
$target_file5 = $target_dir . $reportUpload5;

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "config.php";
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
  $sql = "INSERT INTO `schoolStudentFiles` (`studentUsername`, `fileName`, `file`, `teacher`, `school`, `file2`, `file3`, `file4`, `file5`, `comment`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssssssssss", $param_user, $param_fileName, $param_fileToUpload, $param_teacher, $param_school, $f2, $f3, $f4, $f5, $c);
         $param_user = $child;
         $param_fileName = $documentName;
         $param_fileToUpload = htmlspecialchars( $reportUpload);
         $param_teacher = $teacherUpload;
         $param_school = trim($_POST['school']);
         $f2 = htmlspecialchars($reportUpload2);
         $f3 = htmlspecialchars($reportUpload3);
         $f4 = htmlspecialchars($reportUpload4);
         $f5 = htmlspecialchars($reportUpload5);
         $c = $_POST['comment'];

         move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
         move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
         move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
         move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4);
         move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file5);
  echo '<script>alert("' . $documentName . " " . 'uploaded successfully");document.location="studentFileUpload.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
