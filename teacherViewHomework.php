<?php
require_once "teacherMenu.php";
require_once "config.php";
if (isset($_GET['parentid'])) {
    $id = $_SESSION["parentid"] = $_GET['parentid'];
} else {
    $id = $_SESSION["parentid"];
}
?>
      <h1>Homework Submissions</h1>
      <div class="w3-row-padding w3-padding-16 w3-center" id="options">
        <?php
        $sql = "SELECT parents.*, homework.*
        FROM parents
        INNER JOIN homework ON parents.parentUsername = homework.parentUsername
        WHERE parents.parentID = $id
        ORDER BY homework.date DESC";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $filePath = "Homework\\" . $row['file']; 
            echo "<a href='$filePath' download><div class='w3-quarter w3-teal w3-margin-left w3-margin-bottom w3-round'>";
            echo "<h2><i class='fa fa-cloud-download'></i></h2>";
            echo "<p>" . $row['parentUsername'] . "'s" . " " . $row['fileName'] . ' for subject: ' . $row['subject'] . "</p>";
            echo "</div>";
            echo "</a>";}
        }else{
            echo "<h3>"."There are no homework submissions for this student yet"."</h3>";
        }
        
        mysqli_close($conn);

        ?>
      </div>
    </div>
  <?php include_once "footer.php"; ?>
</body>
</html>