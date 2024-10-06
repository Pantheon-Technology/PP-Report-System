<?php 
include_once "../../../MenusAndFooter/NewMenuAdmin.php";
if (isset($_GET['id'])) {
    $id = $_SESSION["id"] = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "UPDATE `incidents` SET `witness1` = ?, `w1name` = ? WHERE incidentNumber = '$id'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "ss", $param_witness, $param_name);
            $param_witness = $_POST["report"];
            $param_name = $_POST['name'];
            
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Incident No.' . $id . " " . ' has been updated successfully");document.location="incident.php"</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($stmt);
            }
        } mysqli_close($conn);
 ?>
      <h1>Add your statement</h1>
      <p>Use the form below to add your statement to the incident.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><textarea class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Witness Statement" required name="report"></textarea></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="Member of Staff" required name="name"></p>
      
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Update</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset Form</button></p>
    </form>
    </div>
  </div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>