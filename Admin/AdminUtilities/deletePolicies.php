<?php
include_once "../../Utilities/config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$id = $_POST['fileID'];

$file_path = '../../CenterForms/' . $_POST['file'];

if (file_exists($file_path)) {
    if (unlink($file_path)) {
        $sql = "DELETE FROM `policies` where `ID` = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $i);
        $i = $_POST['fileID'];

        if (!mysqli_stmt_execute($stmt)){
            echo "Something went wrong";
        }else{
            echo '<script> window.location = "../Centre/Policies/managePolicies.php"; </script>';
        }
    } else {
        echo 'Unable to delete the file.';
    }
} else {
    echo 'File does not exist.';
}
}
}
?>