<?php require_once "../../../MenusAndFooter/NewMenuAdmin.php";?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> 
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../../AdminUtilities/backend-search-school.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
    <h3>School Search</h3>
        <p>Use the search box below to type in the name of the School or organisation.</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
    <h3>Recent Schools</h3>
    <div class="w3-row-padding w3-padding-16 w3-center" id="options">
    <?php
     $sql1 = "SELECT * FROM `school` LIMIT 20";
     $result = mysqli_query($conn, $sql1); 
     if($result->num_rows){
        while($row = $result->fetch_assoc()){ 
            echo "<a href =\"adminSchoolDetail.php?schoolid=". $row['schoolID'] . "\">" . "<div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round w3-hover-shadow'>";
            echo "<h2><i class='fa fa-eye'></i></h2>";
            echo "<p>" . "View " . $row['schoolName'] . "</p>";
            echo "</div>";
            echo "</a>";
        }
    }
  $conn->close();?>
</div>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>