<?php 
session_start();

$_SESSION = array();

session_destroy();
echo "<script type='text/javascript'>window.top.location='https://mypositiveprogress.co.uk/';</script>"; exit;
?>