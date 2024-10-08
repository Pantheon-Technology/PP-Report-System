<?php require_once "../../MenusAndFooter/mainMenu.php";
include_once '../../Utilities/config.php';?>

  <div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Events/News and Updates</h3>
     <?php
     $sql = "SELECT * FROM posts ORDER BY `postDate` DESC";
     $result = mysqli_query($conn, $sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    $smallDesc = substr($row["eventDesc"], 0, 50);
    $colors = ["w3-green", "w3-blue", "w3-orange"];
    $random = rand(0,2);
      $trim = substr($row["postDate"], 0,10);
      $day = substr($trim, 8);
      $month = substr($trim, 4, 3);
      $year = substr($row["postDate"], 0, 4);
      $date = $day .  $month . "-" . $year;
      echo "<div class = 'w3-border w3-quarter $colors[$random] w3-padding w3-animate-zoom w3-margin-top w3-margin-bottom'>" . "<h4>" . "<b>" . $row["eventName"] . "</b>" . " posted on: " . $date . "</h4>" . "</p>" . "<p>" . $smallDesc . "..." . "</p>" . "<p>". "<a class='w3-button w3-black' href =\"postDetails.php?eventid=" . $row["eventID"] . "\">" . "Find out more" . "</a>" . "</div>";
     }
   }
   else{
      echo "<h4>" . "There are no posts at this time." . "</h4>";
  }
  $conn->close();
    ?>
  </div>
</div>

  <div id="LOCATION" class="w3-panel w3-animate-zoom w3-yellow w3-padding-32">
    <h3>Location</h3>
    <div class="w3-third w3-margin-right">
        <img src="https://mypositiveprogress.co.uk/Pictures/Location.jpg" style="width:100%">
        </div>
        <div class = "w3-half"> 
            <h5><b> Address : 41 Mill Ln, West Derby, Liverpool L12 7HZ </b></h5>
            <h6><b>Travelling by car</b></h6>
            <p>On site parking - Free parking in surrounding area.</p>
            <p>Click <a href="https://maps.app.goo.gl/dem8se84GLvagENi6" target="blank">here</a> to view our West derby centre.</p>
            <p>Click <a href="https://maps.app.goo.gl/ACXKWFGEgzZx2y8TA" target="blank">here</a> to view our Widnes centre.</p>
        </div>
  </div>
    <?php include_once "../../MenusAndFooter/footer.php" ?>

</div>
<script src="index.js"></script>
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