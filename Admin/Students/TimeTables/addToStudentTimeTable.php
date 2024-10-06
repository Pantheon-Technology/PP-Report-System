<?php
include_once "../../../MenusAndFooter/NewMenuAdmin.php";
$id = $_SESSION['bookingID'];
echo $id;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$stmt = $conn->prepare("INSERT INTO `studentTimeTable` (`parentUsername`, `subject`, `link`, `date`, `time`) VALUES (?, ?, ?, ?, ?)");

// Check if the statement is prepared successfully
if ($stmt === false) {
    die("Error in preparing the SQL query: " . $conn->error);
}
$parent = $_SESSION['parent'];
$subject = $_SESSION['courseTitle'];
$link = $_POST['link'];
$date = $_POST['date'];
$time = $_POST['time'];


$stmt->bind_param("sssss", $parent, $subject, $link, $date, $time);

if ($stmt->execute()) {
    $stmt1 = $conn->prepare("DELETE FROM `bookings` WHERE `bookingID` = ?");
    $stmt1->bind_param("s", $id);
    $stmt1->execute();
    echo '<script>alert("Subject:' . $_SESSION['childName'] .  ' has been added to timetable. Press OK to continue");document.location="../../Centre/Bookings/viewBookings.php"</script>';
} else {
    echo "Error: " . $stmt->error;
}
}

?>
<h1>Add <?php echo $_SESSION['courseTitle'] ?> to <?php echo $_SESSION['childName'] ?>'s Time Table</h1>
<p>Use the form below to add a new event to the students timetable.</p>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 

  <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Zoom Link" required name="link"></p>

  <p><input class="w3-input w3-padding-16 w3-border" type="date" auto_complete="no" required name="date"></p>

  <p><input class="w3-input w3-padding-16 w3-border" type="time" auto_complete="no" required name="time"></p>
 
  <p><button class="w3-button w3-light-grey w3-block" type="submit">Create</button></p>
  <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
 </form>
</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>