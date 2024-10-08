<?php
session_start();
include_once "../../Utilities/config.php";

$eventImg = "";
$target_dir = "../../posts/";
$target_file = $target_dir . str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$eventName = $eventDesc = "";
$error = "";

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error = "Sorry, your file is too large.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
    $error = "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $eventImg = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
  } else {
    $error = "Sorry, there was an error uploading your file.";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["eventName"]))) {
        $error = "Please enter a name for the event.";
    } else {
        $sql = "SELECT eventID FROM `posts` WHERE eventName = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_eventName);

            $param_eventName = trim($_POST["eventName"]);

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $error = "This event name has been taken, please use another";
                } else {
                    $eventName = trim($_POST["eventName"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    if (empty($error)) {
        $sql = "INSERT INTO `posts` (eventImg, eventName, eventDesc) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_eventImg, $param_eventName, $param_eventDesc);

            $param_eventName = trim($_POST["eventName"]);
            $param_eventDesc = trim($_POST["eventDesc"]);
            $param_eventImg =  $eventImg;

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("' . $eventName . " " . 'has been posted");document.location="../Main/adminHome.php"</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }else{
        echo '<script>alert("There has been an error uploading your post. Reason for error: ' . $error . " " . '");document.location="../Centre/Policies/makePost.php"</script>';
    }
    mysqli_close($conn);
}
?>