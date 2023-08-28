<?php
include_once "NewMenuAdmin.php";
include_once "config.php";

if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}

$totalHoursPerProject = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql1 = "UPDATE timesheet SET `archived` = 1 WHERE employee_name = ?";
    if ($stmt = mysqli_prepare($conn, $sql1)) {
        mysqli_stmt_bind_param($stmt, "s", $param_id);
        $param_id = $id;
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Time Sheet Archived Successfully")</script>';
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}

$sql = "SELECT * FROM timesheet WHERE employee_name = '$id' AND archived = '0' AND hours_worked != '0' ORDER BY `project` AND `date` DESC";
$result = mysqli_query($conn, $sql);

$totalHours = 0;

?>

<h1>Timesheet for <?php echo $id ?></h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">

<?php 
if ($result->num_rows > 0) {
    echo "<table class='w3-green w3-border'>";
    echo "<tr>";
    echo "<th class='w3-border w3-padding'><h3>Week Commencing</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Date</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Hours Worked</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Premises</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Milage</h3></th>";
    echo "<th class='w3-border w3-padding'><h3>Toll</h3>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {   
        $year = substr($row["weekCommencing"], 0, 4);
        $month = substr($row['weekCommencing'], 5, -3);
        $day = substr($row['weekCommencing'], 8, 10);

        $year1 = substr($row["date"], 0, 4);
        $month1 = substr($row['date'], 5, -3);
        $day1 = substr($row['date'], 8, 10);

        echo "<tr>";
        echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
        echo "<td class='w3-border'>" . $day1 . "-" . $month1 . "-" . $year1 . "</td>";
        echo "<td class='w3-border'>" . $row['hours_worked'] . "</td>";
        echo "<td class='w3-border'>" . $row['project'] . "</td>";
        echo "<td class='w3-border'>". $row['milage']. "</td>";
        echo "<td class='w3-border'>". $row['tunnel']. "</td>";

        $totalHours += $row['hours_worked'];

        $project = $row['project'];
        if (!isset($totalHoursPerProject[$project])) {
            $totalHoursPerProject[$project] = 0;
        }
        $totalHoursPerProject[$project] += $row['hours_worked'];
    }

    echo "</table>";
    echo "<h2>" . $id . " has worked a total of " . $totalHours . " hours since you last archived.</h2>";
    echo "<h3>Total hours worked on each project:</h3>";
    echo "<ul>";
    foreach ($totalHoursPerProject as $project => $totalProjectHours) {
        echo "<li>$project: $totalProjectHours hours</li>";
    }
    echo "</ul>";

    echo "<form method='POST' action=''>";
    echo "<p><button type='submit'>Archive Timesheet</button></p>";
    echo "</form>";
} else {
    echo "<h2>There are no timesheets for $id</h2>";
}

mysqli_close($conn);
?>

</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>