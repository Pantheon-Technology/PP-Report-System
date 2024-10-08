<?php require_once "../../../MenusAndFooter/NewMenuAdmin.php";?>
<h3>Recent Meeting Minutes</h3>
<div class="w3-row-padding w3-padding-16 w3-center" id="options">
    <?php
     $sql = "SELECT * FROM `meetingMinutes` ORDER BY `date` DESC LIMIT 20";
     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
           $filePath = "../../../Minutes\\" . $row['file']; 
         echo "<a href='$filePath' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round'>";
         echo "<h2><i class='fa fa-cloud-download'></i></h2>";
         echo "<p>" . "Download Meeting Minutes for Subject: " . $row['subject'] . "</p>";
         echo "</div>";
         echo "</a>";}
     }else{
         echo "<h3>"."There are no meeting minutes yet"."</h3>";
     }
     
     mysqli_close($conn);

     ?>
   </div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>