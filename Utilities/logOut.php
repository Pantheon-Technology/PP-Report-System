<?php 
session_start();

// Unset all of the session data created when logging in
$_SESSION = array();

// Destroy the session.
session_destroy();
header('location: ../Main/index.php');
?>