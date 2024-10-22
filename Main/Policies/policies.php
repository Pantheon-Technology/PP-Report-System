<?php 
require_once "../../MenusAndFooter/mainMenu.php";
include_once '../../Utilities/config.php';
?>
      <h1>Policy & Legal</h1> 
      <p>Welcome to the Policy and Legal Page. You can download and view the polocies below if you wish. If you would like to make a complaint, you may do so <a href="https://positive-progress.co.uk/complaint-form/"><b>here.</b></a></p>
  <div class="w3-row-padding w3-padding-16 w3-center" id="options">

  <?php 
$sql = "SELECT * FROM `policies`";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
$filePath = "https://mypositiveprogress.co.uk/CenterForms\\" . $row['file']; 
echo "<a href=" . $filePath ." download> <div class='w3-quarter w3-green w3-round w3-margin-left w3-hover-opacity'>" ;
echo '<h2><i class="fa fa-cloud-download"></i></h2>';
echo "<p>Download " . $row['fileName']  . "</p>";
echo  "</div>"."</a>";
}}
else{
 echo "<h2>" . "There are no policies right now, we are currently in the process of reviewing and uploading new policy documents" . "</h2>";
}
$conn->close();
?>
    </div>
  </div>
<?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>