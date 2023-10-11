<?php 
include_once "NewMenuAdmin.php";
require_once "config.php";

$search = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query from the URL parameter

?>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
<h1>Content List</h1>
<!-- Add a form for searching -->
<form method="get">
    <p><input class="w3-input w3-border" type="text" name="search" placeholder="Search" value="<?php echo $search; ?>"></p>
    <p><input type="submit" value="Search"></p>
</form>
<br>
<!-- First Photo Grid-->
<div class="w3-row-padding">

<?php
$sql = "SELECT * FROM `courseContent`";

if (!empty($search)) {
    $sql .= " WHERE `courseTitle` LIKE '%$search%' OR `courseDesc` LIKE '%$search%'";
}

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){   
        echo "<div class='w3-third w3-container w3-margin-bottom '>";
        echo "<div class='w3-container w3-white w3-round'>";
        echo "<p><b> Course: " . $row['courseTitle'] . " for year " . $row['year'] . "</b></p>";
        echo "<p><b> Subject: " . $row['subject'] . "</b></p>";
        echo "<p>" . substr($row["courseDesc"], 0, 40) . "....</p>";
        echo "<a class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' href ='contentInfo-admin.php?id=" . $row["ID"] . "'>" . "Find out more" . "</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h3>No courses match your search.</h3>";
}
mysqli_close($conn);
?>
</div>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>