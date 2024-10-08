<?php
session_start();
$target_dir = "../../CenterForms/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $reportUpload;
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "../../Utilities/config.php";
$documentName = $_POST["reportName"];
$file = "";

if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else {
  $sql = "INSERT INTO `policies` (`fileName`, `file`) VALUES (?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ss", $param_fileName, $param_fileToUpload);
         $param_fileName = $documentName;
         $param_fileToUpload = htmlspecialchars( $reportUpload);

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  echo '<script>alert("' . $reportUpload . " " . 'uploaded successfully");document.location="../Centre/Policies/uploadPolicies.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
