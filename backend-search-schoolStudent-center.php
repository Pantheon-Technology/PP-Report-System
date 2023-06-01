<?php
include_once "config.php";
session_start();
$school = $_SESSION['centerUsername'];

if (isset($_REQUEST["term"])) {
    // Create a select statement
    $sql = "SELECT * FROM `schoolStudent` WHERE schoolName = '$school' AND studentName LIKE ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {

        // create variables then bind them to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set the required parameters
        $param_term = "%" . $_REQUEST["term"] . "%";

        // execute the previously made prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the set of results
            if (mysqli_num_rows($result) > 0) {
                // create an associative array and fetch the results
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  echo "<a href =\"schoolStudent.php?studentid=". $row['studentID'] . "\">" . "View " . $row["studentName"] . "'s" . " details" . "</p>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

    }
    
}     // Close the statement
mysqli_stmt_close($stmt);

?>