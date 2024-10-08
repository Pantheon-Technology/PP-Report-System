<?php
include_once "../../Utilities/config.php";

if (isset($_REQUEST["term"])) {
    $sql = "SELECT * FROM parents WHERE `childFName` LIKE ? OR childLName LIKE ? LIMIT 10";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $param_term, $param_term);
        $param_term = "%" . $_REQUEST["term"] . "%";

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<a href =\"../Students/Account/parents.php?parentid=". $row['parentID'] . "\">" . "View " . $row["childFName"] . " " . $row["childLName"] . "'s details</p>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }
    }
}

mysqli_stmt_close($stmt);
?>