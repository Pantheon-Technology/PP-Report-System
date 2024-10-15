<?php
include_once "../../Utilities/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['fileID'];

    $sql = "SELECT * FROM `resourcePack` WHERE Id = '$id'";
    $result = mysqli_query($conn, $sql);

    $files = [];

   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if(!empty($row['filePath1'])){
        array_push($files, $row['filePath1']);
        }    
        if(!empty($row['filePath2'])){

        array_push($files, $row['filePath2']);
        }    
        if(!empty($row['filePath3'])){
        array_push($files, $row['filePath3']);
        }
        if(!empty($row['filePath4'])){
        array_push($files, $row['filePath4']);
        }
        if(!empty($row['filePath5'])){
        array_push($files, $row['filePath5']);
        }
        if(!empty($row['filePath6'])){
        array_push($files, $row['filePath6']);
        }    
        if(!empty($row['filePath7'])){
        array_push($files, $row['filePath7']);
        }
    }

    $arrayLength = count($files);
    for($i = 0; $i < $arrayLength; $i++){
        $file_path = '../../ResourcePacks/'. $files[$i];
        if (file_exists($file_path)) {
        unlink($file_path);
        }
    }
    
        $sql = "DELETE FROM `resourcePack` where `Id` = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $i);
            $i = $_POST['fileID'];
    
            if (!mysqli_stmt_execute($stmt)){
                echo "Something went wrong";
            }else{
                echo '<script> window.location = "../Centre/Course/searchResourcePacks.php"; </script>';
            }
        }
    }
}
?>