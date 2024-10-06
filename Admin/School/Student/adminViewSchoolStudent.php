<?php require_once "../../../MenusAndFooter/NewMenuAdmin.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../../AdminUtilities/backend-search-schoolStudent.php", {term: inputVal}).done(function(data){
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
    <h3>School Student Search</h3>
        <p>Use the search box below to type in the name of the School or organisation.</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
    <h3>Recent Students</h3>
    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    <?php
     $sql1 = "SELECT * FROM `schoolStudent`";
     $result = mysqli_query($conn, $sql1); 
     if($result->num_rows){
        while($row = $result->fetch_assoc()){ 
            echo "<a href =\"schoolStudentAdmin.php?studentid=". $row['studentID'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
            echo "<h2><i class='fa fa-eye'></i></h2>";
            echo "<p>" . "View " . $row['studentName'] . "</p>";
            echo "</div>";
            echo "</a>";
        }
    }
  $conn->close();?>

</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>