<?php 
include_once "NewMenuAdmin.php";
require_once "config.php";

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the deletion
    $sql = "UPDATE parents SET `archived` = 0 WHERE `parentID` = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_Id);
        $param_Id = $_POST['studentId'];
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Student unarchived successfully")</script>';
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<h1>School Students</h1>

<form method="get">
    <p><input class="w3-input w3-border" type="text" name="search" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>"></p>
    <p><input type="submit" value="Search"></p>
</form>
<br>

<div class="w3-row-padding">
<?php
$sql = "SELECT * FROM `parents` WHERE `archived` = 1";

if (!empty($search)) {
    $sql .= " AND `childFName` LIKE '%$search%' OR `childLName` LIKE '%$search%'";
}

$sql .= ' LIMIT 20';

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {   
        echo "<div class='w3-third w3-container w3-margin-bottom'>";
        echo "<div class='w3-container w3-white w3-round'>";
        echo "<p><b>Student: " . $row['childFName'] . " " . $row['childLName'] . "</b></p>";
        echo "<form method='post' onsubmit='return confirmDelete(this)'>";
        echo "<input type='hidden' name='studentId' value='" . htmlspecialchars($row['parentID']) . "'>";
        echo "<button type='submit' class='w3-button w3-red w3-round w3-margin-bottom w3-hover-opacity'>UnArchive this student</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h3>No students match your search.</h3>";
}
mysqli_close($conn);
?>
</div>

<script>
// JavaScript function for confirmation
function confirmDelete(form) {
    return confirm("Are you sure you want to unarchive this student?");
}
</script>
</div>
<?php include_once "footer.php"; ?>
</body>
</html>