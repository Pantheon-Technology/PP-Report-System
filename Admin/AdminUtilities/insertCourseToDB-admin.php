<?php
session_start();
$admin = $_SESSION['adminUsername'];
$target_dir = "../../courseContent/";
$reportUpload = str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$reportUpload2 = str_replace(" ", "", basename($_FILES["fileToUpload2"]["name"]));
$reportUpload3 = str_replace(" ", "", basename($_FILES["fileToUpload3"]["name"]));
$reportUpload4 = str_replace(" ", "", basename($_FILES["fileToUpload4"]["name"]));
$reportUpload5 = str_replace(" ", "", basename($_FILES["fileToUpload5"]["name"]));
$reportUpload6 = str_replace(" ", "", basename($_FILES["fileToUpload6"]["name"]));
$reportUpload7 = str_replace(" ", "", basename($_FILES["fileToUpload7"]["name"]));


$target_file = $target_dir . $reportUpload;
$target_file2 = $target_dir . $reportUpload2;
$target_file3 = $target_dir . $reportUpload3;
$target_file4 = $target_dir . $reportUpload4;
$target_file5 = $target_dir . $reportUpload5;
$target_file6 = $target_dir . $reportUpload6;
$target_file7 = $target_dir . $reportUpload7;

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
include_once "../../Utilities/config.php";

$file = "";
$teacherUpload = $_SESSION['teacherUsername'];

if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo " Your file was not uploaded.";

} else {

  $sql = "INSERT INTO `courseContent` (`courseTitle`, `courseDesc`, `subject`, `year`, `file1` , `file2`, `file3`, `file4`, `file5`, `file6`, `file7`, `link1`, `link2`, `link3`, `createdBy`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "sssssssssssssss", $ct, $cd, $s, $y, $f1, $f2, $f3, $f4, $f5, $f6, $f7, $l1, $l2, $l3, $cb);
         $ct = $_POST['title'];
         $cd = $_POST['desc'];
         $s = $_POST['subject'];
         $y = $_POST['year'];
         $f1 = htmlspecialchars($reportUpload);
         $f2 = htmlspecialchars($reportUpload2);
         $f3 = htmlspecialchars($reportUpload3);
         $f4 = htmlspecialchars($reportUpload4);
         $f5 = htmlspecialchars($reportUpload5);
         $f6 = htmlspecialchars($reportUpload6);
         $f7 = htmlspecialchars($reportUpload7);
         $l1 = $_POST['link1'];
         $l2 = $_POST['link2'];
         $l3 = $_POST['link3'];
         $cb = $admin;

         
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
  move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
  move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4);
  move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file5);
  move_uploaded_file($_FILES["fileToUpload6"]["tmp_name"], $target_file6);
  move_uploaded_file($_FILES["fileToUpload7"]["tmp_name"], $target_file7);
  echo'<script>alert("' . $ct . " " . 'uploaded successfully");document.location="../Centre/Course/addContent-admin.php"</script>';
}
if (!(mysqli_stmt_execute($stmt))) {
  echo "Error: " . $sql . "<br>" . $conn->error;
 } mysqli_stmt_close($stmt);
    }?>
