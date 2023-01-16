<?php
session_start();
$child = $_SESSION["parentUsername"];
$target_dir = "LegalFormUploads/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "config.php";
$file = "";

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if($fileType != "docx") {
  echo "Sorry, only word document files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $child . ".docx");
  $file = htmlspecialchars( $reportUpload);
  echo '<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="parentUpload.php"</script>';
}
  $sql = "INSERT INTO `legalUpload` (`parentUsername`, `file`) VALUES (?, ?)";
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $param_user, $param_fileToUpload);
    $param_user = $child;
    $param_fileToUpload = $file;
  if (!(mysqli_stmt_execute($stmt))) {
   echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
}?>