<?php
session_start();
include_once "config.php"; 

$eventImg = "";
$target_dir = "posts/";
$target_file = $target_dir . str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Define variables and initialize with empty values
$eventName = $eventDesc = "";
$error = "";

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $eventImg = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
  } else {
    $error = "Sorry, there was an error uploading your file.";
  }
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["eventName"]))) {
        $error = "Please enter a name for the event.";
    } else {
        // Prepare a select statement
        $sql = "SELECT eventID FROM `posts` WHERE eventName = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_eventName);

            // Set parameters to be bound
            $param_eventName = trim($_POST["eventName"]);

            // execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // store the result of the excuting statement
                mysqli_stmt_store_result($stmt);
                // checks if the username already exists
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $error = "This event name has been taken, please use another";
                } else {
                    $eventName = trim($_POST["eventName"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Check input errors before inserting in database
    if (empty($error)) {

        // Prepare an insert statement, inserts the information into the adminaccount table in the database
        $sql = "INSERT INTO `posts` (eventImg, eventName, eventDesc) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_eventImg, $param_eventName, $param_eventDesc);

            // Set parameters to be bound
            $param_eventName = trim($_POST["eventName"]);
            $param_eventDesc = trim($_POST["eventDesc"]);
            $param_eventImg =  $eventImg;

            // execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("' . $eventName . " " . 'has been posted");document.location="adminHome.php"</script>';
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }else{
        echo '<script>alert("There has been an error uploading your post. Reason for error: ' . $error . " " . '");document.location="makePost.php"</script>';
    }

    // Close connection
    mysqli_close($conn);
}
?>