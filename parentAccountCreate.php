<?php include_once 'config.php';
session_start(); 
include_once 'mainMenu.php';
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT parentID FROM parents WHERE parentUsername = ?";   
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = trim($_POST["username"]);
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);
                            if (mysqli_stmt_num_rows($stmt) == 1) {
                                $username_err = "This username is already taken. Please try another";
                            } else {
                                $username = trim($_POST["username"]);
                            }
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                             } mysqli_stmt_close($stmt);
            }
        }
if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }
if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
        } else {
           $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO parents (`parentUsername`, `password`, `parentFName`, `parentLName`, `addressLine1`, `addressLine2`, `city`, `postcode`, `phoneNum`, `eMail`, `childFName`, `childLName`, `gender`, `DOB`, `school`, `yearGroup`, `health`, `socialMedia`, `travel`, `firstAid`, `securityPassword`, `emergencyName1`, `relation1`, `emergencyPostcode1`, `emergencyContactNum1`, `emergencyName2`, `relation2`, `emergencyPostcode2`, `emergencyContactNum2`, `heardBy`, `helpWithFees`, `subject1`, `subject2`, `subject3`, `exam`, `desiredSchool`, `additionalInfo`, `T&CSigned`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssss", $param_username, $param_password, $param_parentFName, $param_parentLName, $param_addressLine1, $param_addressLine2, $param_city, $param_postcode, $param_phoneNum, $param_eMail, $param_childFName, $param_childLName, $param_gender, $param_DOB, $param_school, $param_yearGroup, $param_health, $param_socialMedia, $param_travel, $param_firstAid, $param_securityPassword, $param_emergencyName1, $param_relation1, $param_emergencyPostcode1, $param_emergencyContactNum1, $param_emergencyName2, $param_relation2, $param_emergencyPostcode2, $param_emergencyContactNum2, $param_heardBy, $param_helpWithFees, $param_subject1, $param_subject2, $param_subject3, $param_exam, $param_desiredSchool, $param_additionalInfo, $param_TandCSigned);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_parentFName = trim($_POST['parentFName']);
            $param_parentLName = trim($_POST['parentLName']);
            $param_addressLine1 = trim($_POST['addressLine1']);
            $param_addressLine2 = trim($_POST['addressLine2']);
            $param_city = trim($_POST['city']);
            $param_postcode = trim($_POST['postcode']);
            $param_phoneNum = trim($_POST['phoneNum']);
            $param_eMail = trim($_POST['eMail']);
            $param_childFName = trim($_POST['childFName']);
            $param_childLName = trim($_POST['childLName']);
            $param_gender = trim($_POST['gender']);
            $param_DOB = trim($_POST['DOB']);
            $param_school = trim($_POST['school']);
            $param_yearGroup = trim($_POST['yearGroup']);
            $param_health = trim($_POST['health']);
            $param_socialMedia = trim($_POST['socialMedia']);
            $param_travel = trim($_POST['travel']);
            $param_firstAid = trim($_POST['firstAid']);
            $param_securityPassword = trim($_POST['securityPassword']);
            $param_emergencyName1 = trim($_POST['emergencyName1']);
            $param_relation1 = trim($_POST['relation1']);
            $param_emergencyPostcode1 = trim($_POST['emergencyPostcode1']);
            $param_emergencyContactNum1 = trim($_POST['emergencyContactNum1']);
            $param_emergencyName2 = trim($_POST['emergencyName2']);
            $param_relation2 = trim($_POST['relation2']);
            $param_emergencyPostcode2 = trim($_POST['emergencyPostcode2']);
            $param_emergencyContactNum2 = trim($_POST['emergencyContactNum2']);
            $param_heardBy = trim($_POST['heardBy']);
            $param_helpWithFees = trim($_POST['helpWithFees']);
            $param_subject1 = trim($_POST['subject1']);
            $param_subject2 = trim($_POST['subject2']);
            $param_subject3 = trim($_POST['subject3']);
            $param_exam = trim($_POST['exam']);
            $param_desiredSchool = trim($_POST['desiredSchool']);
            $param_additionalInfo = trim($_POST['additionalInfo']);
            $param_TandCSigned = trim($_POST['T&CSigned']);
            
                if (mysqli_stmt_execute($stmt)) {
                    header("location: parentLogin.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
    }
  ?>
  <head>
      <h1>Parent Account Create</h1>
      <p>Use the form below to create your account. * Indicates a required field.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <h2>Account Information</h2>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Username*" required name="username"></p>
      <?php echo (! empty($username_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $username_err;?>
                </span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Password* (at least 6 characters long)" required name="password"></p>
      <?php echo (! empty($password_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $password_err;?>
                </span>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" auto_complete="no" placeholder="Re-enter Password*" required name="confirm_password"></p>
      <?php echo (! empty($confirm_password_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $confirm_password_err;?>
                </span>
        

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Create a security password*" required name="securityPassword"></p>
      
      <h2>Parent Information</h2>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Parent First Name*" required name="parentFName"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Parent Second Name*" required name="parentLName"></p>
      
      <h2>Address</h2>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Address Line 1*" required name="addressLine1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Address Line 2*" required name="addressLine2"></p>
      <p><input class="w3-border w3-padding-16" type="text" auto_complete="no" placeholder="City*" required name="city">
      <input class="w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Postcode*" required name="postcode"></p>
      
      <h2>Contact Information</h2>
      <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Mobile Phone Number*" required name="phoneNum"></p>
      <p><input class="w3-input w3-border w3-padding-16" type="email" auto_complete="no" placeholder="Email*" required name="eMail"></p>
      
      <h2>Child Information</h2>
      <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Child First Name*" required name="childFName"></p>
      <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Child Last Name*" required name="childLName"></p>      
      
      <p>What is your Childs Gender?</p>
      <p><input type="radio" id="male" required name="gender" value="Male">
      <label for="male">Male</label>
      <input type="radio" id="Female" required name="gender" value="Female">
      <label for="Female">Female</label>
      <input type="radio" id="Other" required name="gender" value="Other">
      <label for="Other">Other</label></p>

      <p>When was your child born?*</p>
      <p><input class="w3-input w3-border w3-padding-16" type="date" auto_complete="no" required name="DOB"></p>      
      <p><input class="w3-input w3-border w3-padding-16" type="text" placeholder="What school does your child attend?" auto_complete="no" name="school"></p>
      <p><input class="w3-input w3-border w3-padding-16" type="text" placeholder="What year is your child in?" name="yearGroup"></p>
      <p><input class="w3-input w3-border w3-padding-16" type="text" placeholder="Does your child have any health issues we should be aware about?" auto_complete="no" name="health"></p>
      
      <p>Are you happy for your child to appear on our social media?*</p>
      <p><input type="radio" id="yes1" required name="socialMedia" value="Yes">
      <label for="yes1">Yes</label>
      <input type="radio" id="No1" required name="socialMedia" value="No">
      <label for="No1">No</label></p>

      <p>Do you give permission for your child to walk/make their own way home from the centre?*</p>
      <p><input type="radio" id="yes2" required name="travel" value="Yes">
      <label for="yes2">Yes</label>
      <input type="radio" id="No2" required name="travel" value="No">
      <label for="No2">No</label></p>

      <p>Are you happy for your child to recieve medical attention from our trained first aider when necessary?*</p>
      <p><input type="radio" id="yes3" required name="firstAid" value="Yes">
      <label for="yes3">Yes</label>
      <input type="radio" id="No3" required name="firstAid" value="No">
      <label for="No3">No</label></p>

      <h2>Emergency Contact 1</h2>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Emergency Contact Name*" required name="emergencyName1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Relation to child*" required name="relation1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Postcode*" required name="emergencyPostcode1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Phone Number*" required name="emergencyContactNum1"></p>
      
      <h2>Emergency Contact 2</h2>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Emergency Contact Name*" required name="emergencyName2"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Relation to child*" required name="relation2"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Postcode*" required name="emergencyPostcode2"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Phone Number*" required name="emergencyContactNum2"></p>

      <h2>Tuition Information</h2>
      <p>What subjects will you be studying with us?</p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Subject*" required name="subject1"></p>      
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Subject" name="subject2"></p>        
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Subject" name="subject3"></p> 

      <p>Will your child be taking an entrance exam?</p>
      <p><input type="radio" id="yes4" name="exam" value="Yes">
      <label for="yes4">Yes</label>
      <input type="radio" id="No4" name="exam" value="No">
      <label for="No4">No</label></p>
      
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="What school are you hoping to send your child to?" name="desiredSchool"></p>
      
      <h2>Additional Information</h2>
      
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="How did you hear about us?" name="heardBy"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="If you would like to add any additional information, please use this box." name="additionalInfo"></p>

      <p>Did you know you can recieve help for your tuition via working/universal tax credits?*</p>
      <p><input type="radio" id="yes5" required name="helpWithFees" value="Yes">
      <label for="yes5">Yes</label>
      <input type="radio" id="No5" required name="helpWithFees" value="No">
      <label for="No5">No</label></p>

      <p>Do you agree to sign the legal documents in the legal section of your account upon account creation?*</p>
      <p><input type="radio" id="yes6" required name="T&CSigned" value="Yes">
      <label for="yes6">Yes</label>
      
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
    </form>
    </div>
</div>
</div>
  <?php include_once "footer.php"?>
</body>
</html>