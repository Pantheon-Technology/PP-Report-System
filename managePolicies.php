<?php include_once "NewMenuAdmin.php"; include "config.php";
?>
      <h1>Manage Policy & Legal</h1> 
      <p>Here you can browse the policies you have uploaded and made available to users, if a document becomes outdated or needs replacing, simply delete the file before uploading it once more.</p>
  <div class="w3-row-padding w3-padding-16 w3-center" id="options">

  <?php 
$sql = "SELECT * FROM `policies`";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){   
$filePath = "CenterForms\\" . $row['file']; 
echo "<div class='w3-quarter w3-grey w3-round w3-margin-left'>" ;
echo '<h2><i class="fa fa-cloud-download"></i></h2>';
echo "<a href=" . $filePath ." download><p>Download " . $row['fileName']  . "</p>" . "</a>";
echo "<form action='deletePolicies.php' method='POST'>";
echo "<input type='hidden' value ='" . $row['ID'] . "' name='fileID'>";
echo "<input type='hidden' value ='" . $row['file'] . "' name='file'>";
echo "<p><button class='w3-red w3-button' type='submit'>Delete</button></p>";
echo  "</div>";
}}
else{
 echo "<h2>" . "You have not uploaded any policies yet" . "</h2>";
}
$conn->close();
?>
    
    </div>
    
  </div>
<?php include_once "footer.php" ?>
</body>
</html>