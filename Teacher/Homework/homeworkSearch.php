<?php require_once "../../MenusAndFooter/teacherMenu.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> //script for searching my database
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../Utility/backend-search-homework.php", {term: inputVal}).done(function(data){
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
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">
    <h3>Student Search</h3>
        <p>Use the search box below to type in the name of the child and view their homework submissions.</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
</div>

<?php include_once "../../MenusAndFooter/footer.php" ?>