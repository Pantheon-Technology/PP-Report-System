<?php 
require_once "../../MenusAndFooter/mainMenu.php";
include_once '../../Utilities/config.php';
session_start();
if (isset($_GET['eventid'])) {
    $eventid = $_SESSION["eventid"] = $_GET['eventid'];
} else {
    $eventid = $_SESSION["eventid"];
}
?>

  <div class="w3-panel w3-yellow w3-animate-right">
  <?php
     $sql = "SELECT * FROM posts WHERE eventID = $eventid";
     $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){    
    $img = $row['eventImg'];
    echo "<div class='w3-third w3-margin'>" . "<img src='../../posts/$img' style='width:220px'>" . "</div>"; 
    echo "<div class = 'w3-half'>" . "<h2>" . $row['eventName'] . "</h2>" . "<p>" ."<h4>" . "Description:". "</h4>" . "</p>" . "<p>" . $row['eventDesc'] . "</p>" . "<a class='w3-button w3-black w3-margin-bottom' href=mailto:admin@positive-progress.co.uk>" . "Contact us" . "</a>" . "</div>";
}
   }
   else{
      echo "<h2>" . "You have attempted to reach this page before selecting an event!" . "</h2>";
  }
  $conn->close();
    ?>
  </div>
</div>
  <?php include_once "../../MenusAndFooter/footer.php"; ?>
</div>

<script>

var mySidebar = document.getElementById("mySidebar");

var overlayBg = document.getElementById("myOverlay");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script src ="index.js"></script>

</body>
</html>