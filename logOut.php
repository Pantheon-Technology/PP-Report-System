<?php 
session_destroy();
$_SESSION["loggedInAdmin"] = false;
$_SESSION["loggedInParent"] = false;
$_SESSION["loggedInTeacher"] = false;
header('location: index.php');
?>