<?php include_once "NewMenuAdmin.php";
require_once "config.php";
$query = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$_SESSION['queryFilter'] = $_POST['filter'];
$query = $_SESSION['queryFilter'];
}
?>
<html>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
    
<h1>Recent Incidents</h1>
<h3>Refine Search</h3>
<p>Use the search box below to refine your search</p>
        <div class="search-box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" autocomplete="off" placeholder="Search..." name="filter"/>
        <button class="w3-button w3-black" type="submit">Search</button>
        </form>
    </div>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
if ($username == 'lheron' || $username == 'llake' || $username == 'j.deberque' || $username == 'tarchibald' || $username == 'BobTheTester' || $username == "l.heron" || $username == "Margaret.Rude21" || $username == "e.colangelo" || $username == "k.dermott" || $username == "gnisted"){
    if($query != null){
        $sql = "SELECT * FROM incidents WHERE (`issueType` LIKE '%$query%' OR `Date` LIKE '%$query%' OR `studentName` LIKE '%$query%' OR `reportedBy` LIKE '%$query%' OR `fullName` LIKE '%$query%')";
    }else{
    $sql = "SELECT * FROM `incidents` ORDER BY `incidentNumber` DESC LIMIT 20";
    }
}else{
    if($query != null){
        $sql = "SELECT * FROM incidents WHERE `issueType` <> 'Safeguarding' AND `issueType` <> 'Background' AND (`issueType` LIKE '%$query%' OR `Date` LIKE '%$query%' OR `studentName` LIKE '%$query%' OR `reportedBy` LIKE '%$query%' OR `fullName` LIKE '%$query%')";
    }else{
    $sql = "SELECT * FROM `incidents` where `issueType` <> 'Safeguarding' AND `issueType` <> 'Background' ORDER BY `Date` DESC LIMIT 20";
    }
}
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
    echo "<table class='w3-green w3-border'>";
    echo "<tr>";
    echo "<th class='w3-border w3-padding'><h3>Date of Incident</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Type</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Student</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Reported By</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Reported On</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>View More Information</h3></th>";
    echo "</tr>";
 
    while ($row = $result->fetch_assoc()) {

    // Format Incident Date (robustly)
    $incidentDateFormatted = '—';
    if (!empty($row['date'])) {
        try {
            $dt = new DateTime($row['date']);
            // Use day-month-year (same style you used before). If you prefer a full month name, use 'd F Y'.
            $incidentDateFormatted = $dt->format('d-m-Y');
        } catch (Exception $e) {
            // leave as fallback '—'
        }
    }

    // Format Reported On (robustly, include time if present)
    $reportedOnFormatted = '—';
    if (!empty($row['reportedOn'])) {
        try {
            $dt2 = new DateTime($row['reportedOn']);
            // include time if the stored value has time information
            $hasTime = (strpos($row['reportedOn'], ':') !== false);
            $reportedOnFormatted = $hasTime ? $dt2->format('d-m-Y H:i') : $dt2->format('d-m-Y');
        } catch (Exception $e) {
            // fallback - raw value escaped
            $reportedOnFormatted = htmlspecialchars($row['reportedOn'], ENT_QUOTES);
        }
    }

    // Determine color class for issue type
    $type = $row['issueType'];
    switch ($type) {
        case 'Safeguarding': $colour = 'w3-blue'; break;
        case 'Behavioural':  $colour = 'w3-red';  break;
        case 'Homework':     $colour = 'w3-yellow'; break;
        case 'Attendance':   $colour = 'w3-orange'; break;
        case 'Background':   $colour = 'w3-orange'; break;
        default:             $colour = 'w3-green';
    }

    echo "<tr>";
    echo "<td class='w3-border w3-padding'>" . htmlspecialchars($incidentDateFormatted, ENT_QUOTES) . "</td>";
    echo "<td class='w3-border " . $colour . "'>" . htmlspecialchars($row['issueType'], ENT_QUOTES) . "</td>";
    echo "<td class='w3-border'>" . htmlspecialchars($row['fullName'], ENT_QUOTES) . "</td>";
    echo "<td class='w3-border'>" . htmlspecialchars($row['reportedBy'], ENT_QUOTES) . "</td>";
    echo "<td class='w3-border'>" . htmlspecialchars($reportedOnFormatted, ENT_QUOTES) . "</td>";
    echo "<td class='w3-border'><a href=\"incident.php?id=" . urlencode($row['incidentNumber']) . "\">View More</a></td>";
    echo "</tr>";
}

  echo "</table>";
}
else{
 echo "<h2>" . "There are no incidents." . "</h2>";
}
$conn->close();
?>
</div>
</div>
</div>
<?php include_once "footer.php" ?>

</body>
</html>