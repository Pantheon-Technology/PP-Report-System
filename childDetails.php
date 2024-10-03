<?php
session_start(); 
include_once "parentMenu.php";
include_once 'config.php';
$username = $_SESSION['parentUsername'];
if(!isset($_SESSION["loggedInParent"]) || $_SESSION["loggedInParent"] !== true){
  header("location: parentLogin.php");
  exit;
}
?>
      <h1>Account Information</h1>
      <div>
        <?php
        $sql = "SELECT * FROM `parents` WHERE `parentUsername` = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              echo "<div class=w3-half>";
                echo "<h2>" . "General Details" . "</h2>";
                echo "<p>" . "Unique ID: " . $row['parentID'] . " Username: " . $row['parentUsername'] . "</p>";
                echo "<p>" . "Child Name: " . $row['childFName'] . $row['childLName'] . "</p>";
                echo "<p>" . "Child Gender: " . $row['gender'] . " D.O.B: " . $row['DOB'] . "</p>";
                echo "<p>" . "Health Issues: " . $row['health'] . "</p>";
                echo "<p>" . "Permission to be on company social media: " . $row['socialMedia'] . "</p>";
                echo "<p>" . "Allowed First Aid: " . $row['firstAid'] . "</p>";
                echo "<p>" . "Security Password: " . $row['securityPassword'] . "</p>";
                echo "<p>" . "Parent Name: " . $row['parentFName'] . $row['parentLName'] . "</p>";
                echo "<p>" . "Account Credits: " . $row['credits'] . "</p>";
                echo "<p>" . "Membership Type: " . $row['membershipType'] . "</p>";
                echo "<p><a href='https://billing.stripe.com/p/login/test_3cseVsdYi82SbFS9AA'>Click here to manage your membership</a></p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Address" . "</h2>" . "</p>";
                echo "<p>" . "Address Line 1: " . $row['addressLine1'] . "</p>";
                echo "<p>" . "Address Line 2: " . $row['addressLine2'] . "</p>";
                echo "<p>" . "City: " . $row['city'] . " Postcode: " . $row['postcode'] .  "</p>";
                echo "<p>" . "<a href='changeAddress.php' class='w3-button w3-round w3-white w3-text-black'>" . "Change Address" . "</a>" . "</p>";
                echo "<p><b>Education Centre</b></p>";
                echo "<p>" . $row['site'] . "</p>";
                echo "<p>" . "<a href='changeCentre.php' class='w3-button w3-round w3-white w3-text-black'>" . "Change Education Centre" . "</a>" . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Education Information" . "</h2>" . "</p>";
                echo "<p>" . "School: " . $row['school'] . " In Year: " . $row['yearGroup'] . "</p>";
                echo "<p>" . "Did you know you can get help with fees if you are on Universal/Working Tax Credit?: " . $row['helpWithFees'] . "</p>";
                echo "<p>" . "Subjects: " . $row['subject1'] . " " . $row['subject2'] . " " . $row['subject3'] . "</p>";
                echo "<p>" . "Will your child be sitting an entrance exam for their school?: " . $row['exam'] . "</p>";
                echo "<p>" . "Desired School: " . $row['desiredSchool'] . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";                
                echo "<p>" . "<h2>" . "Contact Information" . "</h2>" . "</p>";
                echo "<p>" . "Mobile Phone Number: " . $row['phoneNum'] . "</p>";
                echo "<p>" . "Email : " . $row['eMail'] . "</p>";
                echo "<p>" . "<a href='changeContact.php' class='w3-button w3-round w3-white w3-text-black'>" . "Change Contact Information" . "</a>" . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Emergency Contact 1" . "</h2>" . "</p>";
                echo "<p>" . "Name: " . $row['emergencyName1'] . "</p>";
                echo "<p>" . "Relation to Child: " . $row['relation1'] . "</p>";
                echo "<p>" . "Postcode: " . $row['emergencyPostcode1'] . "</p>";
                echo "<p>" . "Phone Number: " . $row['emergencyContactNum1'] . "</p>";
                echo "<p>" . "<a href='changeEmergencyContact1.php' class='w3-button w3-round w3-white w3-text-black'>" . "Change This Emergency Contact" . "</a>" . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Emergency Contact 2" . "</h2>" . "</p>";
                echo "<p>" . "Name: " . $row['emergencyName2'] . "</p>";
                echo "<p>" . "Relation to Child: " . $row['relation2'] . "</p>";
                echo "<p>" . "Postcode: " . $row['emergencyPostcode2'] . "</p>";
                echo "<p>" . "Phone Number: " . $row['emergencyContactNum2'] . "</p>";
                echo "<p>" . "<a href='changeEmergencyContact2.php' class='w3-button w3-round w3-white w3-text-black'>" . "Change This Emergency Contact" . "</a>" . "</p>";
                echo "</div>";

                echo "<div class=w3-half>";
                echo "<p>" . "<h2>" . "Additional Information" . "</h2>" . "</p>";
                echo "<p>" . "How did you hear about us?: " . $row['heardBy'] . "</p>";
                echo "<p>" . "Aware of T&Cs?: " . $row['T&CSigned'] . "</p>";
                echo "<p>" . "Additional Needs: " . $row['additionalInfo'] . "</p>";
                echo "<p>" . "Special Educational Needs: " . $row['SEN'] . "</p>";
                echo "<p>" . "You last modified your information on: " . $row['dateCreated'] . "</p>";
                echo "<p>" . "<a href='changeAdditionalInformation.php' class='w3-button w3-round w3-white w3-text-black'>" . "Add Additional Information" . "</a>" . "</p>";
                
                echo "</div>";

              }
        }else{
            echo "0 results";
        }

        ?>
      </div>
    </div>
    <div id="EVENTS" class="w3-panel w3-white w3-animate-right">
    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    <h2>Incidents area</h2>
    <?php 
$sql = "SELECT * FROM `incidents` WHERE `studentName` = '$username' ORDER BY `incidentNumber` DESC";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
    echo "<a href =\"View_incident_parent.php?id=". $row['incidentNumber'] . "\"><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
    echo "<h2><i class='fa fa-eye'></i></h2>";
    echo "<p>" . "View details of Incident submitted by " . $row['reportedBy'] .  "</p>";
    echo "</div>";
    echo "</a>";
}}
else{
 echo "<h2>" . "There are no incidents." . "</h2>";
}
$conn->close();
?>
</div>
    </div>
  </div>
<?php include_once "footer.php"; 


?>