<?php include_once "NewMenuAdmin.php"; ?>
<div id="EVENTS" class="w3-panel w3-dark-grey w3-animate-right">
    <h1>Create a new resource pack</h1>
    <p>Use the form below to create a new resource pack. A resource pack is a shared resource that holds information on a given topic</p>
    
    <div class="w3-left-align w3-padding-large">
        <form action="adminInsertResourcePack.php" method="post" enctype="multipart/form-data">
            <p><b>Course Title/Topic</b></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" id="topic" name="topic" placeholder="Course Title/Topic" required></p>
            <p><b>Course Description</b></p>
            <p><textarea class="w3-input w3-padding-16 w3-border" name="desc" placeholder="Add Course Description" required></textarea></p>
            <p><b>Course Subject</b></p>
<p>
    <select class="w3-input w3-padding-16 w3-border" id="subject" name="subject" required>
        <option value="" disabled selected>Select a subject</option>
        <option value="Mathematics">Mathematics</option>
        <option value="English">English</option>
        <option value="Biology">Biology</option>
        <option value="Chemistry">Chemistry</option>
        <option value="Physics">Physics</option>
        <option value="History">History</option>
        <option value="Geography">Geography</option>
    </select>
</p>
            <p><b>Level</b></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" id="level" name="level" placeholder="Level" required></p>
            <p><b>Tags</b></p>
            <label for="tag1">Tag 1:</label>
            <input type="text" name="tag1" id="tag1" maxlength="30">
            <label for="tag2">Tag 2:</label>
            <input type="text" name="tag2" id="tag2" maxlength="30">
            <label for="tag3">Tag 3:</label>
            <input type="text" name="tag3" id="tag3" maxlength="30">
            <label for="tag4">Tag 4:</label>
            <input type="text" name="tag4" id="tag4" maxlength="30">
            <label for="tag5">Tag 5:</label>
            <input type="text" name="tag5" id="tag5" maxlength="30">
            <br><h3>Resource Files</h3>
            <p>Please upload up to 7 resource files. Each file should be less than 5MB in size.</p>
            <p><b>File 1 Upload</b></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="file" id="fileToUpload" name="fileToUpload" required></p>
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
            <button class="w3-button w3-black w3-margin-bottom w3-padding-16 w3-border" type="submit">Upload</button>
        </form>
    </div>
</div>
</div>
<?php include_once "footer.php"; ?>