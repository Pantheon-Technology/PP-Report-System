<?php
include_once "NewMenuAdmin.php";

if (isset($_GET['studentid'])) {
    $id = $_SESSION["studentid"] = $_GET['studentid'];
} else {
    $id = $_SESSION["studentid"];
}

$sql = "SELECT * FROM schoolStudent where studentID = $id ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){

        $studentName = $row['studentName'];
        $schoolYear = $row['schoolYear'];
        $subject1 = $row['subject1'];
        $subject2 = $row['subject2'];
        $subject3 = $row['subject3'];
        $otherSubjects = $row['otherSubjects'];
        $date = $row['preferredDate'];
        $time = $row['preferredTime'];
        $otherPreferred = $row['otherPreferred'];
        $allocatedTutor = $row['allocatedTutor'];
        $Mobile = $row['Mobile'];
        $Email = $row['Email'];
        $EmergencyContactName1 = $row['EmergencyContactName1'];
        $EmergencyContactRelationship1 = $row['EmergencyContactRelationship1'];
        $EmergencyContactPhone1 = $row['EmergencyContactPhone1'];
        $EmergencyContactName2 = $row['EmergencyContactName2'];
        $EmergencyContactRelationship2 = $row['EmergencyContactRelationship2'];
        $EmergencyContactPhone2 = $row['EmergencyContactPhone2'];
        $AddressLine1 = $row['AddressLine1'];
        $AddressLine2 = $row['AddressLine2'];
        $PostCode = $row['PostCode'];
        $AdditionalInformation = $row['AdditionalInformation'];
        $live_student_learning_log = $row['live_student_learning_log']; // New field
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE schoolStudent 
    SET studentName = ?, 
        schoolYear = ?, 
        subject1 = ?, 
        subject2 = ?, 
        subject3 = ?, 
        otherSubjects = ?, 
        preferredDate = ?, 
        preferredTime = ?, 
        otherPreferred = ?, 
        allocatedTutor = ?, 
        Mobile = ?, 
        Email = ?, 
        EmergencyContactName1 = ?, 
        EmergencyContactRelationship1 = ?, 
        EmergencyContactPhone1 = ?, 
        EmergencyContactName2 = ?, 
        EmergencyContactRelationship2 = ?, 
        EmergencyContactPhone2 = ?, 
        AddressLine1 = ?, 
        AddressLine2 = ?, 
        PostCode = ?, 
        AdditionalInformation = ?, 
        live_student_learning_log = ?  // Update new field
    WHERE studentID = $id"; 

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "ssssssssssissssssssssss", 
            $param_studentName, 
            $param_schoolYear, 
            $param_subject1, 
            $param_subject2, 
            $param_subject3, 
            $param_otherSubjects, 
            $param_date, 
            $param_time, 
            $param_otherPreferred, 
            $param_allocatedTutor, 
            $Mobile, 
            $Email, 
            $EmergencyContactName1, 
            $EmergencyContactRelationship1, 
            $EmergencyContactPhone1, 
            $EmergencyContactName2, 
            $EmergencyContactRelationship2, 
            $EmergencyContactPhone2, 
            $AddressLine1, 
            $AddressLine2, 
            $PostCode, 
            $AdditionalInformation, 
            $live_student_learning_log); // Bind new parameter

        $param_studentName = trim($_POST['studentName']);
        $param_schoolYear = trim($_POST['schoolYear']);
        $param_subject1 = trim($_POST['subject1']);
        $param_subject2 = trim($_POST['subject2']);
        $param_subject3 = trim($_POST['subject3']);
        $param_otherSubjects = trim($_POST['otherSubjects']);
        $param_date = trim($_POST['date']);
        $param_time = trim($_POST['time']);
        $param_otherPreferred = trim($_POST['otherPreferred']);
        $param_allocatedTutor = trim($_POST['allocatedTutor']);
        $Mobile = trim($_POST['Mobile']);
        $Email = trim($_POST['Email']);
        $EmergencyContactName1 = trim($_POST['EmergencyContactName1']);
        $EmergencyContactRelationship1 = trim($_POST['EmergencyContactRelationship1']);
        $EmergencyContactPhone1 = trim($_POST['EmergencyContactPhone1']);
        $EmergencyContactName2 = trim($_POST['EmergencyContactName2']);
        $EmergencyContactRelationship2 = trim($_POST['EmergencyContactRelationship2']);
        $EmergencyContactPhone2 = trim($_POST['EmergencyContactPhone2']);
        $AddressLine1 = trim($_POST['AddressLine1']);
        $AddressLine2 = trim($_POST['AddressLine2']);
        $PostCode = trim($_POST['PostCode']);
        $AdditionalInformation = $_POST['AdditionalInformation'];
        $live_student_learning_log = $_POST['live_student_learning_log']; // Get new field value

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("' . $param_studentName . ' updated successfully");document.location="schoolStudentAdmin.php?studentid=' . $id . '"</script>';
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<h1>Student Account Edit</h1>
<p>Use the form below to edit <?php echo "<b>" . $studentName . "</b>" . "'s " ?> information. * Indicates a required field.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

<h2>Student Information</h2>
<p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Student Name*" required name="studentName" value ="<?php echo $studentName ?>"></p>

<p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Mobile Number*" name="Mobile" required value ="<?php echo $Mobile ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="Email Address*" name="Email" required value ="<?php echo $Email ?>"></p>

<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Address Line 1*" name="AddressLine1" required value ="<?php echo $AddressLine1 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Address Line 2*" name="AddressLine2" value ="<?php echo $AddressLine2 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Post Code*" name="PostCode" required value ="<?php echo $PostCode ?>"></p>

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

<p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="If other, please specify" name="otherPreferred" value ="<?php echo $otherPreferred ?>"></p>

<p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="What is the preferred time of the student?*" required name="time" value ="<?php echo $time ?>"></p>

<h2>Emergency Contact No.1 Information</h2>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Name 1*" name="EmergencyContactName1" required value ="<?php echo $EmergencyContactName1 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Relationship 1*" name="EmergencyContactRelationship1" required value ="<?php echo $EmergencyContactRelationship1 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Phone 1*" name="EmergencyContactPhone1" required value ="<?php echo $EmergencyContactPhone1 ?>"></p>
<h2>Emergency Contact No.2 Information</h2>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Name 2 *" name="EmergencyContactName2" required value ="<?php echo $EmergencyContactName2 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Relationship 2*" name="EmergencyContactRelationship2" required value ="<?php echo $EmergencyContactRelationship2 ?>"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Emergency Contact Phone 2*" name="EmergencyContactPhone2" required value ="<?php echo $EmergencyContactPhone2 ?>"></p>

<h2>Education Information</h2>
<label for="year">School Year</label>
<select id="year" name="schoolYear">
    <option value ="<?php echo $schoolYear ?>"></option>
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

<label for="subject">Subject 1*</label>
<select id="subject" name="subject1">
    <option value ="<?php echo $subject1 ?>"></option>
    <option value="Maths">Maths</option>
    <option value="English">English</option>
    <option value="Science">Science</option>
</select>

<label for="subject">Subject 2</label>
<select id="subject" name="subject2">
    <option value ="<?php echo $subject2 ?>"></option>
    <option value="Maths">Maths</option>
    <option value="English">English</option>
    <option value="Science">Science</option>
</select>

<label for="subject">Subject 3</label>
<select id="subject" name="subject3">
    <option value ="<?php echo $subject3 ?>"></option>
    <option value="Maths">Maths</option>
    <option value="English">English</option>
    <option value="Science">Science</option>
</select>

<p><input class="w3-input w3-border w3-padding-16" type="text" auto_complete="no" placeholder="Other preferred subjects" required name="otherSubjects" value ="<?php echo $otherSubjects ?>"></p>

<p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Allocated Tutor*" required name="allocatedTutor" value ="<?php echo $allocatedTutor ?>"></p>

<h2>Additional Information</h2>
<p><textarea class="w3-input w3-padding-16 w3-border" placeholder="Additional Information" name="AdditionalInformation"><?php echo $AdditionalInformation ?></textarea></p>

<h2>Live Student Learning Log</h2>
<p><textarea class="w3-input w3-padding-16 w3-border" placeholder="Enter details" name="live_student_learning_log"><?php echo $live_student_learning_log ?></textarea></p>

<p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
</form>
</div>

<?php include_once "footer.php"?>
</body>
</html>
