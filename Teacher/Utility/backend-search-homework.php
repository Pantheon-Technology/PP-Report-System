<?php
include_once "../../Utilities/config.php";

if (isset($_REQUEST["term"])) {
    // Create a select statement
    $sql = "SELECT * FROM parents WHERE `childFName` LIKE ? or childLName LIKE ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {

        // create variables then bind them to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "ss", $param_term, $param_term);

        // Set the required parameters
        $param_term = "%" . $_REQUEST["term"] . "%";

        // execute the previously made prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the set of results
            if (mysqli_num_rows($result) > 0) {
                // create an associative array and fetch the results
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<a href =\"../Homework/teacherViewHomework.php?parentid=". $row['parentID'] . "\">" . "View " . $row["childFName"] ." " . $row["childLName"] . "'s" . " homework submissions" . "</p>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

    }
    
}     // Close the statement
mysqli_stmt_close($stmt);

?>