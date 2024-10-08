<?php 
include_once "../../MenusAndFooter/parentMenu.php";
$username = $_SESSION["parentUsername"]; 

$search = isset($_GET['search']) ? $_GET['search'] : ''; 

?>
<h1>Course List</h1>

<form method="get">
    <p><input class="w3-input w3-border" type="text" name="search" placeholder="Search" value="<?php echo $search; ?>"></p>
    <p><input type="submit" value="Search"></p>
</form>
<br>
<div class="w3-row-padding">

<?php
$sql = "SELECT * FROM `courseList`";

if (!empty($search)) {
    $sql .= " WHERE `courseTitle` LIKE '%$search%' OR `courseDesc` LIKE '%$search%'";
}

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){   
        echo "<div class='w3-third w3-container w3-margin-bottom '>";
        echo "<img src='../../CourseImg/" . $row['courseImage'] . "' alt='courseImage' style='width:100%' class='w3-hover-opacity'>";
        echo "<div class='w3-container w3-white w3-round'>";
        echo "<p><b> Course: " . $row['courseTitle'] . "</b></p>";
        echo "<p>" . substr($row["courseDesc"], 0, 40) . "....</p>";
        echo "<a class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' href ='courseInfo.php?courseid=" . $row["courseID"] . "'>" . "Find out more" . "</a>";
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
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>