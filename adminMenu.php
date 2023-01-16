 <?php  session_start();
if(!isset($_SESSION["loggedInAdmin"]) || $_SESSION["loggedInAdmin"] == false){
  header("location: adminLogin.php");
  exit;
}
$username = $_SESSION['adminUsername']; ?>
<head>
  <title>Positive Progress Reporting System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="ColourScheme.css">
  <link rel="icon" href="Pictures/Logo.png">
</head>
<body class="w3-content background" style="max-width:1300px">
<div class="w3-row">
  <div class="w3-half menu w3-container w3-center" style="height:700px;">
    <div class="w3-padding-64">
      <h1>Positive Progress</h1>
    </div>
    <div class="w3-padding-64">
      <a href="adminHome.php" class="w3-button menu w3-block w3-hover-blue-grey w3-padding-16 w3-text-black">Admin Home</a>
      <a href="logOut.php" class="w3-button menu w3-block w3-hover-dark-grey w3-padding-16">Logout</a>
    </div>
  </div>