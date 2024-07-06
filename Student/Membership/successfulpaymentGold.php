<?php 
include_once "parentMenu.php";
require_once "config.php";
$currentDate = date('d/m/Y');

if (!isset($_SESSION['choice'])){
    header("location: membershipOptions.php");
}
    unset($_SESSION['choice']);
    
    $sql = "UPDATE `parents` SET `membershipType` = ?, `giveCredits` = ?, `memberCredits` = ? WHERE `parentUsername` = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $param_membershipType, $param_giveCredits, $param_credits, $param_username);
        
        $param_membershipType = "gold";
        $param_credits = 3;
        $param_giveCredits = $currentDate;
        $param_username = $username;
        
        if (!(mysqli_stmt_execute($stmt))) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
$conn->close();

?>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:70px">
<h1 class="w3-center"> Thank you for purchasing the gold membership, <b><?php echo $_SESSION['parentUsername'];?></b>! </h1>
<p class="w3-center"> Your account has been given 3 member tokens to purchase a variety of courses on our course page!</p>

<div class="w3-center">
<a href="courseList.php"><div class="w3-quarter w3-green w3-hover-opacity w3-round w3-margin-left w3-margin-bottom">
        <h2><i class="fa fa-graduation-cap"></i></h2>
        <p>View Courses</p>
      </div>
      </a>
</div>
</body>
</html>