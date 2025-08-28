<?php include_once "NewMenuAdmin.php"; include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
$id = $_POST['fileID'];

$file_path = 'CenterForms/' . $_POST['file'];

if (file_exists($file_path)) {
    if (unlink($file_path)) {
        $sql = "DELETE FROM `policies` where `ID` = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $i);
        $i = $_POST['fileID'];

        if (!mysqli_stmt_execute($stmt)){
            echo "Something went wrong";
        }else{
          echo '<script>alert("file deleted successfully");</script>';
        }
    } else {
        echo 'Unable to delete the file.';
    }
} else {
    echo 'File does not exist.';
}

}
}
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
echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
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