<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php"; 
?>

<h1>Archived Class Change Requests</h1>

<!-- Add the search form here -->
<form method="get" action="">
  <input type="text" name="search" placeholder="Search by student name">
  <input type="submit" value="Search">
</form>

<div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM `changeRequests` WHERE `archived` = 1 AND `studentName` LIKE '%$search%' ORDER BY `date` ASC Limit 20";
} else {
    $sql = "SELECT * FROM `changeRequests` WHERE `archived` = 1 ORDER BY `date` ASC Limit 20";
}

$result = mysqli_query($conn, $sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){   
        echo "<a href =\"archivedRequests.php?id=". $row['requestID'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
        echo "<h2><i class='fa fa-eye'></i></h2>";
        echo "<p>" . "View Change Request for: " . $row['studentName'] . "</p>";
        echo "</div>";
        echo "</a>";
    }
} else {
    echo "<h2>" . "No results" . "</h2>";
}

$conn->close();
?>
</div>
</div>

<?php include_once "../../../MenusAndFooter/footer.php" ?>

</body>
</html>