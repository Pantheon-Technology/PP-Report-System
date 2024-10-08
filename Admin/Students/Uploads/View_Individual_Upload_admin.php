<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php";

if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
    $name = $_SESSION["name"] = $_GET["name"];
} else {
    $id = $_SESSION["id"];
    $name = $_SESSION["name"];
}

?>
<html>
<h1><?php echo $id . " " . "for" . " " . $name; ?></h1>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
<?php 
$sql = "SELECT * FROM `reportUpload` WHERE `fileName` = '$id' AND `parentUsername` = '$name' Limit 1";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   

$filePath = "../../uploads\\" . $row['file']; 
$filePath2 = "../../uploads\\" . $row['file2']; 
$filePath3 = "../../uploads\\" . $row['file3']; 
$filePath4 = "../../uploads\\" . $row['file4']; 
$filePath5 = "../../uploads\\" . $row['file5']; 

            echo "<a href='$filePath' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-opacity'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['fileName'] . "</p>";
            echo "</div>";
            echo "</a>";

            if (!empty($row['file2'])){
            echo "<a href='$filePath2' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-opacity'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['file2'] . "</p>";
            echo "</div>";
            echo "</a>";
            }

            if (!empty($row['file3'])){
            echo "<a href='$filePath3' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-opacity'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['file3'] . "</p>";
            echo "</div>";
            echo "</a>";
            }

            if (!empty($row['file4'])){
            echo "<a href='$filePath4' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-opacity'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['file4'] . "</p>";
            echo "</div>";
            echo "</a>";
            }

            if (!empty($row['file5'])){
            echo "<a href='$filePath5' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-opacity'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['file5'] . "</p>";
            echo "</div>";
            echo "</a>";
            } 
 
            if (!empty($row['comment'])){   
                echo "<div class='w3-half'>";  
                echo "<h5>Teacher Comments</h5>";
                echo $row['comment'];
                echo "</div>";
        }}
    }
else{
 echo "<h2>" . "There are no reports right now" . "</h2>";
}
$conn->close();
?>
</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>