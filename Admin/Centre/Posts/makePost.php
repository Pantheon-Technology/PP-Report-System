<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php"; ?>
      <h1>Make a Post</h1>
      <form action="../../AdminUtilities/postUpload.php" method="post" enctype="multipart/form-data">
    <p><input class="w3-input w3-margin-bottom"  placeholder="Title of Post" input type="text" name="eventName">
    <textarea class="w3-input w3-margin-bottom" input type="text" name="eventDesc" placeholder="Post description"></textarea></p>
    <p><b>Choose Image for upload</b></p>
    <p><input type="file" name="fileToUpload" id="fileToUpload"></p>
    <p><button class="w3-button w3-black w3-margin-bottom" input type="submit">Post</button>
    <button class="w3-button w3-white w3-margin-bottom" input type="clear">Clear Form</button></p>
</form>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>
