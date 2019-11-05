<?php

include_once '../connection.php';

$allowedtypes = array(
    "jpg",
    "png",
    "jpeg",
    "gif",
    "mp4"
);

$target_dir = "uploads/";
$file_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Allow certain file formats
if( in_array($fileType, $allowedtypes) == false) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error then uploads file

if ($uploadOk == 1) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $database = new Database();

    $db = $database->getConnection();

    $date = date('m/d/Y h:i:s a', time());

    $query = "INSERT INTO media (tipo, path, titulo, duracao, data_upload) 
        VALUES ($fileType, $target_file, $file_name, $file_duration, $date)";
     $stmt = $db->prepare( $query );
     $stmt->execute();
}
?>