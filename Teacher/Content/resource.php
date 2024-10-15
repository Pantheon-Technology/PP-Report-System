<?php 
include_once "../../MenusAndFooter/teacherMenu.php";
$filePath = '../../../ResourcePacks/';

if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}

     $sql = "SELECT * FROM `resourcePack` WHERE ID = $id";
     $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){    

      $topic = $row['Topic'];
      $desc = $row['Description'];
      $subject = $row['Subject'];
      $level = $row['Level'];
      $file1 = $row['filePath1'];
      $file2 = $row['filePath2'];
      $file3 = $row['filePath3'];
      $file4 = $row['filePath4'];
      $file5 = $row['filePath5'];
      $file6 = $row['filePath6'];
      $file7 = $row['filePath7'];
      $link1 = $row['link1'];
      $link2 = $row['link2'];
      $link3 = $row['link3'];
      $createdBy = $row['createdBy'];
      $lastModifiedDate = $row['LastModifiedDate'];
      $tag1 = $row['Tag1'];
      $tag2 = $row['Tag2'];
      $tag3 = $row['Tag3'];
      $tag4 = $row['Tag4'];
      $tag5 = $row['Tag5'];

      $thisId = $row['Id'];

    }
   }
   else{
      echo "<h2>" . "You have attempted to reach this page before selecting a resource!" . "</h2>";
  }
  $conn->close();

    ?>
    <html>
    <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">
<a href="searchResourcePacks.php"><-back</a>
<h1><?php echo $topic ?></h1>
<?php
$tags = [ $tag1, $tag2, $tag3, $tag4, $tag5];
$filteredTags = array_filter($tags);
$tagString = implode(" | ", $filteredTags);
if (!empty($tagString)) {
    echo "<h3>Tags</h3>";
    echo "<p>" . htmlspecialchars($tagString) . "</p>";
    if($createdBy === $username){
        echo "<a class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' href='editResourceTags.php?id=" . $thisId . "'>" . "Edit Tags" . "</a>";
    }
}
$timestamp = strtotime($lastModifiedDate);
$ukFormat = date('d/m/Y', $timestamp);
echo "<p>Last modified date: " . $ukFormat . "</p>";  
?>
<div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
    <div class='w3-container w3-white w3-round'>
     <h3>Course Information</h3>
      <h4>Description</h4>
      <p><?php echo $desc; ?></p>
      <?php
        if($createdBy === $username){
            echo "<a class='w3-button w3-black w3-round w3-margin-bottom w3-hover-opacity' href='editResourceDescription.php?id=" . $thisId . "'>" . "Edit Description" . "</a>";
        }
      ?>

      <h4>Subject</h4>
      <p><?php echo $subject; ?></p>

      <h4>Level</h4>
      <p><?php echo $level; ?></p>

 
      </div>
    </div>

    <div class="w3-third w3-margin-bottom">
        <div class='w3-container w3-teal w3-round'>
            <h3>Files</h3>
            <?php if (!empty($file1)) { ?>
    <p><a href='<?php echo $filePath . $file1; ?>' download><?php echo $file1; ?></a></p>
<?php } ?>

<?php if (!empty($file2)) { ?>
    <p><a href='<?php echo $filePath . $file2; ?>' download><?php echo $file2; ?></a></p>
<?php } ?>

<?php if (!empty($file3)) { ?>
    <p><a href='<?php echo $filePath . $file3; ?>' download><?php echo $file3; ?></a></p>
<?php } ?>

<?php if (!empty($file4)) { ?>
    <p><a href='<?php echo $filePath . $file4; ?>' download><?php echo $file4; ?></a></p>
<?php } ?>

<?php if (!empty($file5)) { ?>
    <p><a href='<?php echo $filePath . $file5; ?>' download><?php echo $file5; ?></a></p>
<?php } ?>

<?php if (!empty($file6)) { ?>
    <p><a href='<?php echo $filePath . $file6; ?>' download><?php echo $file6; ?></a></p>
<?php } ?>

<?php if (!empty($file7)) { ?>
    <p><a href='<?php echo $filePath . $file7; ?>' download><?php echo $file7; ?></a></p>
<?php } ?>
        </div>
    </div>

    <div class="w3-third w3-margin-bottom">
        <div class='w3-container w3-orange w3-round'>
          <h3>Links</h3>
          <?php if (!empty($link1)) { ?>
    <p><a href='<?php echo $link1; ?>' target='_blank'>Link One</a></p>
    <?php } ?>
    <?php if (!empty($link2)) { ?>
    <p><a href='<?php echo $link2; ?>' target='_blank'>Link Two</a></p>
    <?php } ?>
    <?php if (!empty($link3)) { ?>
    <p><a href='<?php echo $link3; ?>' target='_blank'>Link Three</a></p>
      <?php } ?>
        </div>
    </div>

</div>
</div>

<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>