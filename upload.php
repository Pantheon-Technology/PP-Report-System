<?php
session_start();
$target_dir = "uploads/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "config.php";
$child = $_POST["childName"];
$documentName = $_POST["reportName"];
$file = "";

// Check if file already exists
 if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
 }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if($fileType != "docx") {
  echo "Sorry, only xls files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo " Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $file = htmlspecialchars( $reportUpload);
  echo '<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="upAndDown.php"</script>';
}
    $sql = "INSERT INTO `reportUpload` (`parentUsername`, `fileName`, `file`) VALUES (?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "sss", $param_user, $param_fileName, $param_fileToUpload);
         $param_user = $child;
         $param_fileName = $documentName;
         $param_fileToUpload = $file;
        if (!(mysqli_stmt_execute($stmt))) {
         echo "Error: " . $sql . "<br>" . $conn->error;
        } mysqli_stmt_close($stmt);
       }?>
