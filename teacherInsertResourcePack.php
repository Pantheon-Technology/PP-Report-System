<?php
session_start();
include_once "config.php";
$teacher = $_SESSION['teacherUsername'];
$target_dir = "ResourcePacks/";
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
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo " Your file was not uploaded.";
} else {
    $sql = "INSERT INTO resourcePack 
        (Subject, Topic, Level, Tag1, Tag2, Tag3, Tag4, Tag5, 
        Description, filePath1, filePath2, filePath3, filePath4, 
        filePath5, filePath6, filePath7, link1, link2, link3, createdBy) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssisssssssssssssssss", 
            $subject, $topic, $level, $tag1, $tag2, $tag3, $tag4, 
            $tag5, $description, $filePath1, $filePath2, $filePath3, 
            $filePath4, $filePath5, $filePath6, $filePath7, 
            $link1, $link2, $link3, $createdBy
        );
        $topic = $_POST['topic'];
        $description = $_POST['desc'];
        $subject = $_POST['subject'];
        $level = $_POST['level'];
        $tag1 = $_POST['tag1'];
        $tag2 = $_POST['tag2'];
        $tag3 = $_POST['tag3'];
        $tag4 = $_POST['tag4'];
        $tag5 = $_POST['tag5'];
        $createdBy = $teacher;
        $filePath1 = htmlspecialchars($reportUpload);
        $filePath2 = htmlspecialchars($reportUpload2);
        $filePath3 = htmlspecialchars($reportUpload3);
        $filePath4 = htmlspecialchars($reportUpload4);
        $filePath5 = htmlspecialchars($reportUpload5);
        $filePath6 = htmlspecialchars($reportUpload6);
        $filePath7 = htmlspecialchars($reportUpload7);
        $link1 = $_POST['link1'];
        $link2 = $_POST['link2'];
        $link3 = $_POST['link3'];
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
        move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4);
        move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file5);
        move_uploaded_file($_FILES["fileToUpload6"]["tmp_name"], $target_file6);
        move_uploaded_file($_FILES["fileToUpload7"]["tmp_name"], $target_file7);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("' . $topic . ' uploaded successfully");document.location="teacherNewResourcePack.php"</script>';
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>