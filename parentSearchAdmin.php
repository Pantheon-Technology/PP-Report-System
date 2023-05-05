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
 
    <?php
     $sql1 = "SELECT * FROM `parents` ORDER BY `dateCreated` DESC LIMIT 20";
     $result = mysqli_query($conn, $sql1); 
     if($result->num_rows){
        while($row = $result->fetch_assoc()){ 
           echo "<a href =\"parents.php?parentid=". $row['parentID'] . "\">" . "View " . $row["childFName"] ." " . $row["childLName"] . "'s" . " details" . "</p>";
        }
    }
  $conn->close();?>

</div>
</div>
<?php include_once "footer.php" ?>