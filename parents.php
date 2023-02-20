<?php
require_once "NewMenuAdmin.php";
require_once "config.php";
if (isset($_GET['parentid'])) {
    $id = $_SESSION["parentid"] = $_GET['parentid'];
} else {
    $id = $_SESSION["parentid"];
}
?>
</html>
<body>
      <h1><?php echo $username . "'s details"; ?></h1>
      <div>
        <?php
        $sql = "SELECT * FROM parents where parentID = $id ";
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
              echo "</div>";

              echo "<div class=w3-half>";
              echo "<p>" . "<h2>" . "Address" . "</h2>" . "</p>";
              echo "<p>" . "Address Line 1: " . $row['addressLine1'] . "</p>";
              echo "<p>" . "Address Line 2: " . $row['addressLine2'] . "</p>";
              echo "<p>" . "City: " . $row['city'] . " Postcode: " . $row['postcode'] .  "</p>";
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
              echo "</div>";

              echo "<div class=w3-half>";
              echo "<p>" . "<h2>" . "Emergency Contact 1" . "</h2>" . "</p>";
              echo "<p>" . "Name: " . $row['emergencyName1'] . "</p>";
              echo "<p>" . "Relation to Child: " . $row['relation1'] . "</p>";
              echo "<p>" . "Postcode: " . $row['emergencyPostcode1'] . "</p>";
              echo "<p>" . "Phone Number: " . $row['emergencyContactNum1'] . "</p>";
              echo "</div>";

              echo "<div class=w3-half>";
              echo "<p>" . "<h2>" . "Emergency Contact 2" . "</h2>" . "</p>";
              echo "<p>" . "Name: " . $row['emergencyName2'] . "</p>";
              echo "<p>" . "Relation to Child: " . $row['relation2'] . "</p>";
              echo "<p>" . "Postcode: " . $row['emergencyPostcode2'] . "</p>";
              echo "<p>" . "Phone Number: " . $row['emergencyContactNum2'] . "</p>";
              echo "</div>";

              echo "<div class=w3-half>";
              echo "<p>" . "<h2>" . "Additional Information" . "</h2>" . "</p>";
              echo "<p>" . "How did you hear about us?: " . $row['heardBy'] . "</p>";
              echo "<p>" . "Do you know to sign the T&C's in the Legal section of your account?: " . $row['T&CSigned'] . "</p>";
              echo "<p>" . "Additional Information: " . $row['additionalInfo'] . "</p>";
              echo "<p>" . "You have been with us since: " . $row['dateCreated'] . "</p>";
              echo "</div>";
              }
        }else{
            echo "0 results";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  </div>
  <?php include_once "footer.php"; ?>
</body>
</html>