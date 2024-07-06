<?php include_once "NewMenuAdmin.php"; include "config.php";?>

<!--Events tab -->
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">

    <h1>Create Course Content</h1>
    <p>Using the form below, you can add resources for your course content. You may upload up to 7 files and 3 links for any given topic.</p>
      <div class="w3-left-align w3-padding-large">
        <form action="insertCourseToDB-admin.php" method="post" enctype="multipart/form-data">

          <p><b>Course Title</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="title" name="title" placeholder="Course Title" required></p>

          <p><b>Course Description</b></p>
          <p><textarea class="w3-input w3-padding-16 w3-border" type="text" name="desc" placeholder="Add Course Description"></textarea></p>

          <p><b>Course Subject</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="subject" name="subject" placeholder="Course Subject" required></p>

          <p><b>Year</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="number" id="year" name="year" placeholder="year" required></p>

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
          <p><b>File 6 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload6" name="fileToUpload6"></p>
          <p><b>File 7 Upload</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload7" name="fileToUpload7"></p>

          <p><b>Link 1</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="Link1" name="link1" placeholder="Link One"></p>

          <p><b>Link 2</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="Link2" name="link2" placeholder="Link Two"></p>

          <p><b>Link 3</b></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" id="Link3" name="link3" placeholder="Link Three"></p>

          <button class="w3-button w3-black w3-margin-bottom w3-input w3-padding-16 w3-border" input type="submit" >Upload</button>
        </form>

        </div>
     </div>
   </div>
 </div>
 <?php include_once "footer.php" ?>
</body>
</html>