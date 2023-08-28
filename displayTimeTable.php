<?php
include_once "teacherMenu.php";
include_once "config.php";
$currentDate = date("Y-m-d");
?>
<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Time table</h1>
<?php 
 $sql = "SELECT * FROM timeTable WHERE `teacher` = '$username' AND `date` >= '$currentDate' ORDER BY `date` AND `time` DESC";
 $result = mysqli_query($conn, $sql);
 if($result->num_rows > 0){
   echo "<table class='w3-green w3-border'>";
   echo "<tr>";
   echo "<th class='w3-border w3-padding'><h3>Date of Session</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Time</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Subject</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>Zoom Link</h3></th>";
   echo "<th class='w3-border w3-padding'><h3>View More Information</h3></th>";
   echo "</tr>";
 while($row = $result->fetch_assoc()){   

    $year = substr($row["date"], 0, 4);
    $month = substr($row['date'], 5, -3);
    $day = substr($row['date'], 8, 10);

    $year1 = substr($row["date"], 0, 4);
    $month1 = substr($row['date'], 5, -3);
    $day1 = substr($row['date'], 8, 10);

     echo "<tr>";
     echo "<td class='w3-border w3-padding'>" . $day . "-" . $month . "-" . $year . "</td>";
     echo "<td class='w3-border'>" . $row['time'] . "</td>";
     echo "<td class='w3-border'>" . $row['subject'] . "</td>";
     echo "<td class='w3-border'>". "<a target='_blank' href=" . $row['link'] . ">" . "Zoom Link" . "</a>" . "</td>";
     echo "<td class='w3-border'>". "<a href =\"timetableClassInformation.php?id=". $row['classID'] . "\">View More</a>"  . "</td>";
     
 }
}else {
    echo "<h3>You have no time tabled sessions, if you believe this is in error, please contact a system admin.</h3>";
}
 echo "</table>";
mysqli_close($conn);
?>
<br>
</div>
<?php include_once "footer.php" ?>
</body>
</html>
