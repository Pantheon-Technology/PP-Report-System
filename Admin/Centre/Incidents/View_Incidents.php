<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php";
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
if ($username == "l.heron" || $username == "Margaret.Rude21" || $username == "e.colangelo" || $username == "k.dermott" || $username == "gnisted"){
    if($query != null){
        $sql = "SELECT * FROM incidents WHERE (`issueType` LIKE '%$query%' OR `Date` LIKE '%$query%' OR `studentName` LIKE '%$query%' OR `reportedBy` LIKE '%$query%' OR `fullName` LIKE '%$query%')";
    }else{
    $sql = "SELECT * FROM `incidents` ORDER BY `incidentNumber` DESC LIMIT 20";
    }
}else{
    if($query != null){
        $sql = "SELECT * FROM incidents WHERE `issueType` <> 'Safeguarding' AND (`issueType` LIKE '%$query%' OR `Date` LIKE '%$query%' OR `studentName` LIKE '%$query%' OR `reportedBy` LIKE '%$query%' OR `fullName` LIKE '%$query%')";
    }else{
    $sql = "SELECT * FROM `incidents` where `issueType` <> 'Safeguarding' ORDER BY `Date` DESC LIMIT 20";
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
    echo "<th class='w3-border w3-padding'><h3>View More Information</h3></th>";
    echo "</tr>";
 
    while($row = $result->fetch_assoc()){   
 
     $year = substr($row["date"], 0, 4);
     $month = substr($row['date'], 5, -3);
     $day = substr($row['date'], 8, 10);

     $type = $row['issueType'];

     switch ($type){
        case 'Safeguarding':
            $colour = 'w3-blue';
            break;
        case 'Behavioural':
            $colour = 'w3-red';
            break;
        case 'Homework':
            $colour = 'w3-yellow';
            break;
        case 'Attendance':
            $colour = 'w3-orange';
            break;
        default:
            $colour = 'w3-green';
     }
 
      echo "<tr>";
      echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
      echo "<td class='w3-border " . $colour . "'>" . $row['issueType'] . "</td>";
      echo "<td class='w3-border'>" . $row['fullName'] . "</td>";
      echo "<td class='w3-border'>" . $row['reportedBy'] . "</td>";
      echo "<td class='w3-border'>". "<a href =\"incident.php?id=". $row['incidentNumber'] . "\">View More</a>"  . "</td>";
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
<?php include_once "../../../MenusAndFooter/footer.php" ?>

</body>
</html>