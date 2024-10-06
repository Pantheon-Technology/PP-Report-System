<?php include_once "../../../MenusAndFooter/NewMenuAdmin.php"; ?>
      <h1>Upload Meeting Minutes</h1>
      <form action="../AdminUtilities/meetingUpload.php" method="post" enctype="multipart/form-data">
    <p><input class="w3-input w3-margin-bottom"  placeholder="Subject of Meeting" input type="text" name="subject" required>
    <textarea class="w3-input w3-margin-bottom" input type="text" name="summary" placeholder="Meeting Summary (optional)"></textarea></p>
    <p><b>Meeting File</b></p>
    <p><input type="file" name="fileToUpload" id="fileToUpload"></p>
    <p><button class="w3-button w3-black w3-margin-bottom" input type="submit">Post</button>
    <button class="w3-button w3-white w3-margin-bottom" input type="clear">Clear Form</button></p>
</form>
</div>
<?php include_once "../../../MenusAndFooter/footer.php" ?>
</body>
</html>
