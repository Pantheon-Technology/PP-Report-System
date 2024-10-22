<?php 
include_once "../../MenusAndFooter/teacherMenu.php";
$filePath = 'https://mypositiveprogress.co.uk/courseContent/';

if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}

     $sql = "SELECT * FROM `courseContent` WHERE ID = $id";
     $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){    

      $title = $row['courseTitle'];
      $courseDesc = $row['courseDesc'];
      $subject = $row['subject'];
      $year = $row['year'];
      $file1 = $row['file1'];
      $file2 = $row['file2'];
      $file3 = $row['file3'];
      $file4 = $row['file4'];
      $file5 = $row['file5'];
      $file6 = $row['file6'];
      $file7 = $row['file7'];
      $link1 = $row['link1'];
      $link2 = $row['link2'];
      $link3 = $row['link3'];
      $createdBy = $row['createdBy'];

    }
   }
   else{
      echo "<h2>" . "You have attempted to reach this page before selecting a course!" . "</h2>";
  }

  
 
  $conn->close();

    ?>
    <html>
    <div id="Main" class="w3-panel w3-dark-grey w3-animate-right">

<h1><?php echo $title ?></h1>
<div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
    <div class='w3-container w3-white w3-round'>
     <h3>Course Information</h3>
      <h4>Description</h4>
      <p><?php echo $courseDesc; ?></p>

      <h4>Subject</h4>
      <p><?php echo $subject; ?></p>

      <h4>Year</h4>
      <p><?php echo $year; ?></p>
 
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
          <h3>Additional Links</h3>
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