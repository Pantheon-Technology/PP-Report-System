<?php 
include_once "adminMenu.php";
include_once 'config.php';
$username = "";
$username_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
     $username_err = "Please enter a username.";
    } else {
      $sql = "SELECT parentID FROM parents WHERE parentUsername = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
         mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = trim($_POST["username"]);
            if (mysqli_stmt_execute($stmt)) {
                 mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        $username_err = "This username does not exist. Please try another";
                    } else {
                        $username = trim($_POST["username"]);
                    }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                } mysqli_stmt_close($stmt);
            }
        }
if (empty($username_err)) {
 $sql = "DELETE FROM parents WHERE parentUsername = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("' . $username . " " . 'removed successfully")</script>';
            } else {
                 echo "Oops! Something went wrong. Please try again later.";
            } mysqli_stmt_close($stmt);
    }
        } mysqli_close($conn);
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in drop down box on the page
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>Parent Account REMOVE</h1>
      <p>Use the form below to REMOVE a parent from your system.</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" auto_complete="no" placeholder="username" required name="username"></p>
      <?php echo (! empty($username_err)) ? 'is-invalid' : '';?>
                <span class="invalid-feedback">
                <?php echo $username_err;?>
                </span>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">Remove</button></p>
      <p><button class="w3-button w3-light-grey w3-block" type="reset">Reset data</button></p>
        </form>

        <h2>Username Search</h2>
        <p> Type in the name of the child to find out the username</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
    </div>
  </div>
<?php include_once "footer.php" ?>
</body>
</html>