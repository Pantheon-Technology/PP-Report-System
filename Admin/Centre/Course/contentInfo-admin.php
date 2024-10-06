<?php 
include_once "../../../MenusAndFooter/NewMenuAdmin.php";

if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
  $id = $_SESSION["id"];
}

$filePath = '../../../courseContent/';

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
            <?php
if (!empty($file1)) {
    echo "<p><a href='" . $filePath . $file1 . "' download>" . $file1 . "</a></p>";
}

if (!empty($file2)) {
    echo "<p><a href='" . $filePath . $file2 . "' download>" . $file2 . "</a></p>";
}

if (!empty($file3)) {
    echo "<p><a href='" . $filePath . $file3 . "' download>" . $file3 . "</a></p>";
}

if (!empty($file4)) {
    echo "<p><a href='" . $filePath . $file4 . "' download>" . $file4 . "</a></p>";
}

if (!empty($file5)) {
    echo "<p><a href='" . $filePath . $file5 . "' download>" . $file5 . "</a></p>";
}

if (!empty($file6)) {
    echo "<p><a href='" . $filePath . $file6 . "' download>" . $file6 . "</a></p>";
}

if (!empty($file7)) {
    echo "<p><a href='" . $filePath . $file7 . "' download>" . $file7 . "</a></p>";
}
?>
        </div>
    </div>

    <div class="w3-third w3-margin-bottom">
        <div class='w3-container w3-orange w3-round'>
          <h3>Additional Links</h3>
          <?php
if (!empty($link1)) {
    echo "<p><a href='" . $link1 . "' target='_blank'>Link One</a></p>";
}

if (!empty($link2)) {
    echo "<p><a href='" . $link2 . "' target='_blank'>Link Two</a></p>";
}

if (!empty($link3)) {
    echo "<p><a href='" . $link3 . "' target='_blank'>Link Three</a></p>";
}
?>
        </div>
    </div>
</div>
</div>
</div>

<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>