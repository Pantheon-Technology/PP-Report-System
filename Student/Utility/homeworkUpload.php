<?php
session_start();
$child = $_SESSION["parentUsername"];
$target_dir = "../../Homework/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "../../Utilities/config.php";
$file = "";

if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else if ($uploadOk = 1) {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $file = htmlspecialchars( $reportUpload);
  echo '<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="../Homework/homework.php"</script>';
  $sql = "INSERT INTO `homework` (`parentUsername`, `fileName`, `subject`, `file`) VALUES (?, ?, ?, ?)";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "ssss", $param_user, $param_fileName, $param_subject, $param_fileToUpload);
    $param_user = $child;
    $param_fileToUpload = trim($file);
    $param_fileName = trim($_POST["fileName"]);
    $param_subject = trim($_POST["subject"]);
  if (!(mysqli_stmt_execute($stmt))) {
   echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
}
}
  ?>