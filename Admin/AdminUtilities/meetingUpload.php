<?php
session_start();
$target_dir = "../../Minutes/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "../../Utilities/config.php";
$file = "";


if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else {
  $sql = "INSERT INTO `meetingMinutes` (`subject`, `summary`, `file`) VALUES (?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "sss", $param_subject, $param_summary, $param_fileToUpload);
         $param_subject = trim($_POST['subject']);
         $param_summary = trim($_POST['summary']);
         $param_fileToUpload = htmlspecialchars( $reportUpload);

  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  echo '<script>alert("uploaded successfully");document.location="../Main/adminHome.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
