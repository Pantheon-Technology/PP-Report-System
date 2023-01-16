<?php
session_start(); 
include_once 'config.php';
$username = $_SESSION['parentUsername'];
if(!isset($_SESSION["loggedInParent"]) || $_SESSION["loggedInParent"] !== true){
  header("location: parentLogin.php");
  exit;
}
?>
<head>
  <title>Positive Progress Report System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="ColourScheme.css">
</head>
<body class="w3-content background" style="max-width:1300px">
<div class="w3-row">
  <div class="w3-half menu w3-container w3-center" style="height:auto">
    <div class="w3-padding-64">
      <h1>Positive Progress</h1>
    </div>
    <div class="w3-padding-64">
      <a href="parentHome.php" class="w3-button menu w3-block w3-hover-blue-grey w3-padding-16">Home</a>
      <a href="viewReport.php" class="w3-button menu w3-block w3-hover-red w3-padding-16">View Reports</a>
      <a href="childDetails.php" class="w3-button menu w3-block w3-hover-black w3-padding-16">View Details</a>
      <a href="logOut.php" class="w3-button menu w3-block w3-hover-teal w3-padding-16">Logout</a>
    </div>
  </div>
  <div class="w3-half w3-blue-grey w3-container" style="height:auto">
    <div class="w3-padding-64 ">
      <h1 class="w3-center"><?php echo $username . "'s details"; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM `parents` WHERE `parentUsername` = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<p>" . "Unique ID: " . $row['parentID'] . " Username: " . $row['parentUsername'] . "</p>";
                echo "<p>" . "Child Name: " . $row['childFName'] . $row['childLName'] . "</p>";
                echo "<p>" . "Child Gender: " . $row['gender'] . " D.O.B: " . $row['DOB'] . "</p>";
                echo "<p>" . "Health Issues: " . $row['health'] . "</p>";
                echo "<p>" . "Permission to be on company social media: " . $row['socialMedia'] . "</p>";
                echo "<p>" . "Allowed First Aid: " . $row['firstAid'] . "</p>";
                echo "<p>" . "Security Password: " . $row['securityPassword'] . "</p>";
                echo "<p>" . "Parent Name: " . $row['parentFName'] . $row['parentLName'] . "</p>";

                echo "<p>" . "<h2 class='w3-center'>" . "Address" . "</h2>" . "</p>";
                echo "<p>" . "Address Line 1: " . $row['addressLine1'] . "</p>";
                echo "<p>" . "Address Line 2: " . $row['addressLine2'] . "</p>";
                echo "<p>" . "City: " . $row['city'] . " Postcode: " . $row['postcode'] .  "</p>";

                echo "<p>" . "<h2 class='w3-center'>" . "Education Information" . "</h2>" . "</p>";
                echo "<p>" . "School: " . $row['school'] . " In Year: " . $row['yearGroup'] . "</p>";
                echo "<p>" . "Did you know you can get help with fees if you are on Universal/Working Tax Credit?: " . $row['helpWithFees'] . "</p>";
                echo "<p>" . "Subjects: " . $row['subject1'] . " " . $row['subject2'] . " " . $row['subject3'] . "</p>";
                echo "<p>" . "Will your child be sitting an entrance exam for their school?: " . $row['exam'] . "</p>";
                echo "<p>" . "Desired School: " . $row['desiredSchool'] . "</p>";
                
                echo "<p>" . "<h2 class='w3-center'>" . "Contact Information" . "</h2>" . "</p>";
                echo "<p>" . "Mobile Phone Number: " . $row['phoneNum'] . "</p>";
                echo "<p>" . "Email : " . $row['eMail'] . "</p>";

                echo "<p>" . "<h2 class='w3-center'>" . "Emergency Contact 1" . "</h2>" . "</p>";
                echo "<p>" . "Name: " . $row['emergencyName1'] . "</p>";
                echo "<p>" . "Relation to Child: " . $row['relation1'] . "</p>";
                echo "<p>" . "Postcode: " . $row['emergencyPostcode1'] . "</p>";
                echo "<p>" . "Phone Number: " . $row['emergencyContactNum1'] . "</p>";

                echo "<p>" . "<h2 class='w3-center'>" . "Emergency Contact 2" . "</h2>" . "</p>";
                echo "<p>" . "Name: " . $row['emergencyName2'] . "</p>";
                echo "<p>" . "Relation to Child: " . $row['relation2'] . "</p>";
                echo "<p>" . "Postcode: " . $row['emergencyPostcode2'] . "</p>";
                echo "<p>" . "Phone Number: " . $row['emergencyContactNum2'] . "</p>";

                echo "<p>" . "<h2 class='w3-center'>" . "Additional Information" . "</h2>" . "</p>";
                echo "<p>" . "How did you hear about us?: " . $row['heardBy'] . "</p>";
                echo "<p>" . "Do you know to sign the T&C's in the Legal section of your account?: " . $row['T&CSigned'] . "</p>";
                echo "<p>" . "Additional Information: " . $row['additionalInfo'] . "</p>";
                echo "<p>" . "You have been with us since: " . $row['dateCreated'] . "</p>";
              }
        }else{
            echo "0 results";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  </div>
</body>
</html>