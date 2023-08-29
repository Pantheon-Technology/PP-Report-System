<?php 
include_once "parentMenu.php";
require_once "config.php";
require_once "paymentConfigTest.php";

if (isset($_GET['courseid'])) {
    $courseid = $_SESSION["courseid"] = $_GET['courseid'];
} else {
  $courseid = $_SESSION["courseid"];
}

     $sql = "SELECT * FROM `courseList` WHERE courseID = $courseid";
     $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){    
      $courseName = $row['courseTitle'];
      $img = "courseImg/" . $row['courseImage'];
      $courseDesc = $row['courseDesc'];
      $learningObjectives = $row['learningObjectives'];
      $credits = $row['credits'];
    }
   }
   else{
      echo "<h2>" . "You have attempted to reach this page before selecting a course!" . "</h2>";
  }

  $sql1 = "SELECT * FROM `parents` WHERE `parentUsername` = '$username'";
  $result1 = mysqli_query($conn, $sql1);
if($result1->num_rows > 0){
 while($row1 = $result1->fetch_assoc()){    
   $accountBal = $row1['credits'];
   $email = $row1['eMail'];
   $Fname = $row1['childFName'];
   $Lname = $row1['childLName'];
   $membershipCredits = $row1['memberCredits'];
 }
}
else{}

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if (isset($_POST["form1Input"])){
    if($credits > $accountBal){
      echo "<h2>You do not have enough credits to purchase this course</h2>";
    }else{
      
      $sql2 = "UPDATE `parents` SET `credits` = `credits` - ? WHERE parentUsername = '$username'";
    if ($stmt = mysqli_prepare($conn, $sql2)) {

    mysqli_stmt_bind_param($stmt, "i", $param_credits);

    $param_credits = $credits;

    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }else{

      $sql3 = "INSERT INTO `bookings` (`parentUsername`, `email`, `courseTitle`, `childFName`, `childLName`) VALUES (?, ?, ?, ?, ?)";
      if ($stmt1 = mysqli_prepare($conn, $sql3)){
        mysqli_stmt_bind_param($stmt1, "sssss", $param_username, $param_email, $param_courseTitle, $param_childFirstName, $param_childLastName);

        $param_username = $username;
        $param_email = $email;
        $param_courseTitle = $courseName;
        $param_childFirstName = $Fname;
        $param_childLastName = $Lname;

        echo '<script>alert("Thank you for purchasing this course, click OK to continue");document.location="parentViewBookings.php"</script>';
      } if (!mysqli_stmt_execute($stmt1)) {
        echo "Error: " . $sql3 . "<br>" . $conn->error;

    }
  }

   // mysqli_stmt_close($stmt);
    }

  }
}
  
  if(isset($_POST["form2Input"])){
    if ($membershipCredits > 0){
      $sql2 = "UPDATE `parents` SET `memberCredits` = `memberCredits` - ? WHERE parentUsername = '$username'";
    if ($stmt = mysqli_prepare($conn, $sql2)) {

    mysqli_stmt_bind_param($stmt, "i", $param_credits);

    $param_credits = 1;

    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }else{
echo "test";
      $sql3 = "INSERT INTO `bookings` (`parentUsername`, `email`, `courseTitle`, `childFName`, `childLName`) VALUES (?, ?, ?, ?, ?)";
      if ($stmt2 = mysqli_prepare($conn, $sql3)){
        mysqli_stmt_bind_param($stmt2, "sssss", $param_username, $param_email, $param_courseTitle, $param_childFirstName, $param_childLastName);

        $param_username = $username;
        $param_email = $email;
        $param_courseTitle = $courseName;
        $param_childFirstName = $Fname;
        $param_childLastName = $Lname;

        echo '<script>alert("Thank you for purchasing this course, click OK to continue");document.location="parentViewBookings.php"</script>';
      } if (!mysqli_stmt_execute($stmt2)) {
        echo "Error: " . $sql3 . "<br>" . $conn->error;

    }
  }

    mysqli_stmt_close($stmt);
    }
    }else{
      echo "<h2>You do not have enough membership credits to purchase this course</h2>";
    }
  }
  }
 
  $conn->close();

    ?>
    <html>

<h1><?php echo $courseName ?></h1>
<div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
    <img src="<?php echo $img ?>" alt="Course Image" style="width:100%" class="w3-hover-opacity">
    <div class='w3-container w3-white w3-round'>
      <p> This course costs <?php echo $credits ?> credits </p>
      <form method="post">
      <p><button class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' type="submit" value="<?php echo $courseName ?>" name="form1Input">Purchase With Credits</button> </p>
      </form>
      <form method="post">
      <p><button class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' type="submit" value="<?php echo $courseName ?>" name="form2Input">Use Membership Credits</button> </p>
      </form>
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
      <h3>Learning Objectives</h3>
      <p><?php echo $learningObjectives ?></p>
    </div>

<div class="w3-third w3-margin-bottom">
      <h3>Course Description</h3>
      <p><?php echo $courseDesc ?></p>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>