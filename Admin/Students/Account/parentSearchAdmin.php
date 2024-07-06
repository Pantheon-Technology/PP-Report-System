<?php require_once "NewMenuAdmin.php";
require_once "config.php";

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search-admin.php", {term: inputVal}).done(function(data){
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
    <h3>Student Search</h3>
        <p>Use the search box below to type in the name of the child.</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
    <h3>Recent Students</h3>
    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    <?php
     $sql1 = "SELECT * FROM `parents` ORDER BY `dateCreated` DESC";
     $result = mysqli_query($conn, $sql1); 
     if($result->num_rows){
        while($row = $result->fetch_assoc()){ 
           echo "<a href =\"parents.php?parentid=". $row['parentID'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom'>";
           echo "<h2><i class='fa fa-user'></i></h2>";
           echo "<p>" . "View " . $row["childFName"] ." " . $row["childLName"] . "'s" . " details"  . "</p>";
           echo "</div>";
           echo "</a>";
        
        }
    }
  $conn->close();?>
</div>
</div>
</div>
<?php include_once "footer.php" ?>