<?php include_once "../../MenusAndFooter/teacherMenu.php";?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script> 
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../../Utilities/backend-search.php", {term: inputVal}).done(function(data){
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

<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Upload Report</h1>
    <p>Use the form below to upload a report for a child, you may use the 'username search' to find out their username if required.</p>
      <div class="w3-left-align w3-padding-large">
        <form action="../Utility/upload.php" method="post" enctype="multipart/form-data">
        <?php
          $query = "SELECT * FROM parents ORDER BY `parentUsername`  ASC";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<p>" . "<b>" . "Parent Username" . "</b>" . "</p>";
    echo '<select name="childName">';
    echo '<option>' . "select" . '</option>';

    while ($row = mysqli_fetch_assoc($result)) {
        $value = $row['parentUsername']; 
        echo '<option value="' . $value . ' ">' . $value . '</option>';
    }
    echo '</select>';

    mysqli_free_result($result);
} else {
    echo 'Error: ' . mysqli_error($connection);
}
?>
          <p><b>Name of Documents</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="reportName" name="reportName" placeholder="Name of documents" required></p>
          <p><b>File 1 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload" name="fileToUpload"></p>
          <p><b>File 2 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload2" name="fileToUpload2"></p>
          <p><b>File 3 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload3" name="fileToUpload3"></p>
          <p><b>File 4 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload4" name="fileToUpload4"></p>
          <p><b>File 5 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload5" name="fileToUpload5"></p>

          <p><textarea class="w3-input w3-padding-16 w3-border" type="text" name="comment" placeholder="Add comment"></textarea></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" >Upload</button>
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
 <?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>