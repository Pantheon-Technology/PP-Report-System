<?php require_once "../../MenusAndFooter/schoolMenuLoggedIn.php";?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../Utility/backend-search-schoolStudent-center.php", {term: inputVal}).done(function(data){
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
    <h3>Student Search</h3>
        <p>Use the search box below to type in the name of the student.</p>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search..." />
        <div class="result"></div>
    </div>
</div>
</div>
<?php include_once "../../MenusAndFooter/footer.php" ?>