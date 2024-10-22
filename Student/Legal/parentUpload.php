<?php
include_once "../../MenusAndFooter/parentMenu.php"; ?>
    <h1>Upload Legal Forms</h1>
    <p>We ask that you would take the time to read the documents below. Once you have read these documents, you can sign them and upload them below.</p>
    <br>
    <p><a href="https://mypositiveprogress.co.uk/DefaultLegalForms/Centre_Behaviour_Policy_parents_and_carers_Dec_2022.docx" download>Behaviour Policy</a></p>
    <p><a href="https://mypositiveprogress.co.uk/DefaultLegalForms/General_Tuition_Terms_and_Conditions_Dec_2022.docx" download>Tuition Terms and Conditions</a></p>
    <p><a href="https://mypositiveprogress.co.uk/DefaultLegalForms/Parental_responsibility_updated_Dec_2022.docx" download>Parental Responsibility</a></p>
      <div class="w3-left-align w3-padding-large">
        <form action="../Utility/uploadForParents.php" method="post" enctype="multipart/form-data">
          <p><b>File Upload</b></p>
          <p><input type="file" id="fileToUpload" name="fileToUpload"></p>
          <button class="w3-button w3-black w3-margin-bottom" input type="submit" value="Upload Image" required>Upload Document</button>
        </form> 
        </div>
     </div>
   </div>
 </div>
 <?php include_once "../../MenusAndFooter/footer.php" ?>
</body>
</html>