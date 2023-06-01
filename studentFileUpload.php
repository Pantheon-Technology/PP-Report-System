<?php include_once "teacherMenu.php";?>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search-schoolStudent.php", {term: inputVal}).done(function(data){
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

    <h1>Upload Report</h1>
    <p>Use the form below to upload a report for a school student, you may use the 'username search' to find out their username if required.</p>
      <div class="w3-left-align w3-padding-large">
        <form action="studentUpload.php" method="post" enctype="multipart/form-data">

        <?php
          $query = "SELECT * FROM schoolStudent"; // Replace 'your_table' with the actual table name

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    echo "<p>" . "<b>" . "Student Username" . "</b>" . "</p>";
    echo '<select name="childName">';
    echo '<option>' . "select" . '</option>';

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {

        $value = $row['studentUsername']; 

        // Create an option tag with the fetched value
        echo '<option value="' . $value . ' ">' . $value . '</option>';
    }

    // End the dropdown box
    echo '</select>';

    // Free the result set
    mysqli_free_result($result);
} else {
    // Error handling if the query fails
    echo 'Error: ' . mysqli_error($connection);
}
?>

          <p><b>Name of Document</b></p>
          <p><input type="text" id="reportName" name="reportName" placeholder="Name of document" required></p>
<?php
          $query = "SELECT * FROM school"; // Replace 'your_table' with the actual table name

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    
    echo "<p>" . "<b>" . "Student School" . "</b>" . "</p>";
    echo '<select name="school">';
    echo '<option>' . "select" . '</option>';

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {

        $value = $row['schoolName']; 

        // Create an option tag with the fetched value
        echo '<option value="' . $value . '">' . $value . '</option>';
    }

    // End the dropdown box
    echo '</select>';

    // Free the result set
    mysqli_free_result($result);
} else {
    // Error handling if the query fails
    echo 'Error: ' . mysqli_error($connection);
}
?>

          <p><b>File Upload</b></p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" value="Upload Image" required>Upload Document</button>
        </form>
        
        <h2>Username Search</h2>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>