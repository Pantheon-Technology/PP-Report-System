<?php
include_once "../../Utilities/config.php";

if (isset($_REQUEST["term"])) {
    $sql = "SELECT * FROM `schoolStudent` WHERE studentName LIKE ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        $param_term = "%" . $_REQUEST["term"] . "%";
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $studentName = htmlspecialchars($row["studentName"], ENT_QUOTES, 'UTF-8');
                    echo "<a href =\"../School/Student/schoolStudentAdmin.php?studentid=" . $row['studentID'] . "\">View " . $studentName . "'s details</a>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not execute the query. " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare the query. " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>