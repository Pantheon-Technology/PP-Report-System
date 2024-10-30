<?php 
include_once "NewMenuAdmin.php";
$search = isset($_GET['search']) ? $_GET['search'] : ''; 
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}
?>
<div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
<h1>Content List</h1>
<form method="get">
    <p><input class="w3-input w3-border" type="text" name="search" placeholder="Search" value="<?php echo $search; ?>"></p>
    <p><input type="submit" value="Search"></p>
</form>
<br>
<div class="w3-row-padding">
<?php
$sql = "SELECT * FROM `resourcePack`";
if (!empty($search)) {
    $sql .= " WHERE `Subject` LIKE '%$search%' OR `Topic` LIKE '%$search%' OR `Topic` LIKE '%$search%' OR `Level` LIKE '%$search%' OR `Tag1` LIKE '%$search%' OR `Tag2` LIKE '%$search%' OR `Tag3` LIKE '%$search%' OR `Tag4` LIKE '%$search%' OR `Tag5` LIKE '%$search%'";
}
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){   
        switch ($row['Subject']) {
            case 'Mathematics':
                $colour = 'w3-red';    
            case 'Biology':
                $colour = 'w3-grey'; 
            case 'Chemistry':
                $colour = 'w3-yellow'; 
            case 'Biology':
                $colour = 'w3-teal'; 
    
            case 'English':
                $colour = 'w3-blue'; 
    
            case 'History':
                $colour = 'w3-brown';
    
            case 'Geography':
                $colour = 'w3-orange';
            
            default:
            $colour = 'w3-white';
            }
        echo "<div class='w3-third w3-container w3-margin-bottom '>";
        echo "<div class='w3-container " . $colour . " w3-round'>";
        echo "<p><b> Topic: " . $row['Topic'] . "</b></p>";
        echo "<p><b> Subject: " . $row['Subject'] . "</b></p>";
        echo "<p>" . substr($row["Description"], 0, 40) . "....</p>";
        echo "<p><b>Resource Tags</b></p>";
        $tags = [ $row["Tag1"], $row["Tag2"], $row["Tag3"], $row["Tag4"], $row["Tag5"]];
        $filteredTags = array_filter($tags);
        $tagString = implode(" | ", $filteredTags);
        if (!empty($tagString)) {
            echo "<p>" . htmlspecialchars($tagString) . "</p>";
        }
        echo "<a class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' href ='adminResource.php?id=" . $row["Id"] . "'>" . "Browse Content" . "</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h3>No resources are in your system yet</h3>";
}
mysqli_close($conn);
?>
</div>
</div>
</div>
<?php include_once "footer.php" ?>
</body>
</html>