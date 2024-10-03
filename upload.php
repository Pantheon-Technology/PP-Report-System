<?php
session_start();
$target_dir = "uploads/";
$child = $_POST["childName"];
include_once "config.php";

$sql = "SELECT eMail FROM parents WHERE parentUsername = $child";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
  $_SESSION["emailForUpload"] = $row["eMail"];
}
}

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

$documentName = $_POST["reportName"];
$file = "";
$teacherUpload = $_SESSION['teacherUsername'];

if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

$sql = "SELECT `parentUsername`FROM `parents` WHERE `parentUsername` = ?";
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

  $sql = "INSERT INTO `reportUpload` (`parentUsername`, `fileName`, `file`, `teacher`, `comment`, `file2` , `file3`, `file4`, `file5`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "sssssssss", $param_user, $param_fileName, $param_fileToUpload, $param_teacher, $param_comment, $param_fileToUpload2, $param_fileToUpload3, $param_fileToUpload4, $param_fileToUpload5);
         $param_user = $child;
         $param_fileName = $documentName;
         $param_fileToUpload = htmlspecialchars($reportUpload);
         $param_teacher = $teacherUpload;
         $param_comment = $_POST['comment'];
         $param_fileToUpload2 = htmlspecialchars($reportUpload2);
         $param_fileToUpload3 = htmlspecialchars($reportUpload3);
         $param_fileToUpload4 = htmlspecialchars($reportUpload4);
         $param_fileToUpload5 = htmlspecialchars($reportUpload5);
         
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
  move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
  move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4);
  move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file5);

  require "SendUploadEmail.php";

   echo'<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="upAndDown.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
