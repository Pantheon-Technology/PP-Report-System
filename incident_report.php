<?php
session_start();
include_once "config.php";
if(!isset($_SESSION["loggedInTeacher"]) || $_SESSION["loggedInTeacher"] !== true){
  header("location: teacherLogin.php");
    exit; }
    $username = $_SESSION['teacherUsername'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "INSERT INTO `incidents` (`studentName`, `date`, `time`, `issueType`, `desc`, `reffered`, `otherReffered`, `followUp`, `whoFollowedUp`, `reportedBy`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssssssssss", $param_studentName, $param_date, $param_time, $param_issueType, $param_desc, $param_reffered, $param_otherReffered, $param_followUp, $param_whoFollowedUp, $param_reportedBy);
         $param_studentName = trim($_POST['student']);
         $param_date = trim($_POST['date']);
         $param_time = trim($_POST['time']);
         $param_issueType = trim($_POST['incidentType']);
         $param_desc = trim($_POST['description']);
         $param_reffered = trim($_POST['safeguardingStaff']);
         $param_otherReffered = trim($_POST['otherName']);
         $param_followUp = trim($_POST['followUp']);
         $param_whoFollowedUp = trim($_POST['followUpName']);
         $param_reportedBy = $username;   
            
                if (mysqli_stmt_execute($stmt)) {
                  echo '<script>alert("Incident added successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
         mysqli_close($conn);
          }
    
  ?>
 <!DOCTYPE html>
<html>
<head>
<title>My Positive Progress</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
    <!-- Top container -->
<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">My positive Progress - Teacher</span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container">
      <img src="Pictures/logo.png" style="width:220px">
    </div>
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="upAndDown.php" class="w3-bar-item w3-button w3-padding">Upload a Report</a>
    <a href="incident_report.php" class="w3-bar-item w3-button w3-padding">Report an Incident</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding">Logout</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;margin-top:43px;">

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
  <h1 class ="w3-animate-top"><b>My Positive Progress</b></h1>
</header>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Incident Report</h1>
    <p>Use the form below to fill out an incident report.</p>
      <div class="w3-left-align w3-padding-large">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <p><b>Student Name*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="text" name="student" placeholder="Name the student involved" required></p>
          <p><b>Date of Incident*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="date" name="date" auto_complete="no" required></p>   
          <p><b>Time of Incident*</b></p>
            <p><input class="w3-input w3-border w3-padding-16" type="time" name="time" required>
          <p><b>Type of Incident*</b></p>
            <p><input type="radio" id="Behavioural" required name="incidentType" value="Behavioural">
            <label for="Behavioural">Behavioural</label>
            <input type="radio" id="Safeguarding" required name="incidentType" value="Safeguarding">
            <label for="Safeguarding">Safeguarding</label></p>
          <p><b>Statement of Facts*</b></p>
            <p><textarea class="w3-input w3-padding-16 w3-border" type="textarea" auto_complete="no" placeholder="Description of Incident" name="description"></textarea></p>
            <label for="staff">Reffered by:*</label>
            <select id="staff" name="safeguardingStaff">
                <option value="Georgia Nisted">Georgia Nisted</option>
                <option value="Lisa Heron">Lisa Heron</option>
                <option value="Katie McDermott">Katie McDermott</option>
                <option value="Kate Allen">Kate Allen</option>
                <option value="Other">Other</option>
            </select>
            <p><b>If OTHER, please state...</b></p>
                <p><input class="w3-input w3-border w3-padding-16" type="text" name="otherName" placeholder="Name"></p>
            <p><b>Follow Up Actions</b></p>
                <p><textarea class="w3-input w3-padding-16 w3-border" type="textarea" auto_complete="no" placeholder="What has been done?" name="followUp"></textarea></p>
            <p><b>Who followed up?</b></p>
                <p><input class="w3-input w3-border w3-padding-16" type="text" name="followUpName" placeholder="Name"></p>

          <button class="w3-button w3-black w3-margin-bottom" input type="submit" required>Upload incident to the system</button>
        </form>
        
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>