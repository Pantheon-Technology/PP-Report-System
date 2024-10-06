<?php
include_once "../../../MenusAndFooter/NewMenuAdmin.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT `studentID` FROM `schoolStudent` WHERE `studentUsername` = ?";   
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

        // File 1 handling
        $file1 = $_FILES['file1'];
        $file1_name = $file1['name'];
        $file1_tmp = $file1['tmp_name'];
        $file1_size = $file1['size'];
        
        // File 2 handling
        $file2 = $_FILES['file2'];
        $file2_name = $file2['name'];
        $file2_tmp = $file2['tmp_name'];
        $file2_size = $file2['size'];
        
        // File 1 destination
        $file1_destination = '../../../PEPfiles/' . $file1_name;
        
        // File 2 destination
        $file2_destination = '../../../EHCPfiles/' . $file2_name;
        
        // Move uploaded files to desired destination
        if (move_uploaded_file($file1_tmp, $file1_destination) || move_uploaded_file($file2_tmp, $file2_destination)){
            
        }   else{
            echo "error uploading files";
        }
    }

    $sql = "INSERT INTO schoolStudent (`studentUsername`, `password`, `studentName`, `schoolName`, `schoolYear`, `SEND`, `EHCP`, `PEP`, `PEPauth`, `subject1`, `subject2`, `subject3`, `otherSubjects`, `preferredDate`, `preferredTime`, `otherPreferred`, `allocatedTutor`, `dbs`, `trn`, `register`, `PEPfile`, `EHCPfile`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", $param_username, $param_password, $param_studentName, $param_schoolName, $param_schoolYear, $param_SEND, $param_EHCP, $param_PEP, $param_PEPauth, $param_subject1, $param_subject2, $param_subject3, $param_otherSubjects, $param_date, $param_time, $param_otherPreferred, $param_allocatedTutor, $param_dbs, $param_trn, $param_register, $param_PEPfile, $param_EHCPfile);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_studentName = trim($_POST['studentName']);
            $param_schoolName = trim($_POST['school']);
            $param_schoolYear = trim($_POST['schoolYear']);
            $param_SEND = trim($_POST['SEND']);
            $param_EHCP = trim($_POST['EHCP']);
            $param_PEP = trim($_POST['PEP']);
            $param_PEPauth = trim($_POST['PEPauth']);
            $param_subject1 = trim($_POST['subject1']);
            $param_subject2 = trim($_POST['subject2']);
            $param_subject3 = trim($_POST['subject3']);
            $param_otherSubjects = trim($_POST['otherSubjects']);
            $param_date = trim($_POST['date']);
            $param_time = trim($_POST['time']);
            $param_otherPreferred = trim($_POST['otherPreferred']);
            $param_allocatedTutor = trim($_POST['allocatedTutor']);
            $param_dbs = trim($_POST['dbs']);
            $param_trn = trim($_POST['trn']);
            $param_register = trim($_POST['register']);
            $param_PEPfile = $file2_destination;
            $param_EHCPfile = $file1_destination;
                        
                if (mysqli_stmt_execute($stmt)) {

                    echo '<script>alert("' . $username . " " . 'added successfully")</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }

    }
  ?>

      <h1>Student Account Create</h1>
      <p>Use the form below to create your account. * Indicates a required field.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

      <h2>Account Information</h2>

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Student Name*" required name="studentName"></p>
      
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

<?php
        $query = "SELECT * FROM school"; 
        $result = mysqli_query($conn, $query);

if ($result) {
    echo "<p>" . "<b>" . "School*" . "</b>" . "</p>";
    echo '<select name="school">';
    echo '<option>' . "select" . '</option>';

    while ($row = mysqli_fetch_assoc($result)) {

        $value = $row['schoolName']; 
        echo '<option value="' . $value . ' ">' . $value . '</option>';
    }

    echo '</select>'. "</p>";

    mysqli_free_result($result);
} else {
    echo 'Error: ' . mysqli_error($connection);
}
?>
                <label for="year">School Year</label>
            <select id="year" name="schoolYear">
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
                <option value="5">Year 5</option>
                <option value="6">Year 6</option>
                <option value="7">Year 7</option>
                <option value="8">Year 8</option>
                <option value="9">Year 9</option>
                <option value="10">Year 10</option>
                <option value="11">Year 11</option>
                <option value="12">Year 12</option>
                <option value="13">Year 13</option>
            </select>

      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Please detail any special educational needs of the student, if any*" required name="SEND"></textarea>

      <p>Does the student have a Education, Health and Care Plan?*</p>
      <p><input type="radio" id="yes1" required name="EHCP" value="Yes">
      <label for="yes1">Yes</label>
      <input type="radio" id="No1" required name="EHCP" value="No">
      <label for="No1">No</label></p>

      <label for="file2">EHCP File Upload</label>
        <input type="file" name="file2" id="file2" ><br><br>

      <p>Does the student have P.E.P?*</p>
      <p><input type="radio" id="yes2" required name="PEP" value="Yes">
      <label for="yes2">Yes</label>
      <input type="radio" id="No2" required name="PEP" value="No">
      <label for="No2">No</label></p>

      <label for="file1">P.E.P file</label>
        <input type="file" name="file1" id="file1" ><br><br>

      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Who is the home authority responsible for P.E.P?*" required name="PEPauth"></p>
      
      <label for="day">Preferred Day</label>
            <select id="day" name="date">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
                <option value="Other">Other</option>
            </select>

            <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="If other, please specify" name="otherPreferred"></p>      
      
      
      <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="What is the preferred time of the student?*" required name="time"></p>      
      
      <label for="subject">Subject 1*</label>
            <select id="subject" name="subject1">
                <option value="Maths">Maths</option>
                <option value="English">English</option>
                <option value="Science">Science</option>
            </select>

      <label for="subject">Subject 2</label>
            <select id="subject" name="subject2">
                <option value="Subject">Subject</option>
                <option value="Maths">Maths</option>
                <option value="English">English</option>
                <option value="Science">Science</option>
            </select>

      <label for="subject">Subject 3</label>
            <select id="subject" name="subject3">
                <option value="Subject">Subject</option>
                <option value="Maths">Maths</option>
                <option value="English">English</option>
                <option value="Science">Science</option>
            </select>
            
        <p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Other preferred subjects" required name="otherSubjects"></p>      

        <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Allocated Tutor*" required name="allocatedTutor"></p>

        <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="DBS*" required name="dbs"></p>

        <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="TRN" name="trn"></p>

        <p>Is the Tutor registered to update service?*</p>
        <p><input type="radio" id="yes1" required name="register" value="Yes">
            <label for="yes1">Yes</label>
        <input type="radio" id="No1" required name="register" value="No">
            <label for="No1">No</label></p>
      
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
    </form>
    </div>
 
</div>
</div>
  <?php include_once "../../../MenusAndFooter/footer.php"?>
 </body>
</html>