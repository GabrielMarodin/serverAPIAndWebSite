<?php
    include_once 'api/connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $group_name = $_GET['group_name'];

    $query = "SELECT * FROM media_select, media INNER JOIN media ON media_select.id_media = media.id WHERE media_select.nome = ?";

    $stmt = $db->prepare( $query );

    $stmt->execute([$group_name]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Slides</title>
        <link rel="shortcut icon" href="res/favicon.ico"/>
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body class="black">

        <div class="slideshow-container">

            <?php

            foreach($data as $file) {
                echo '<div class="mySlides fade" id="mySlides">';
                echo '<div class="numbertext">'.$file['id'].'</div>';
                if($file['tipo'] == 'mp4' || $file['tipo'] == 'obb' || $file['tipo'] == 'webm'){
                    echo '<video id="'.$file['id'].'" class="responsive-video" data-duracao="'.$file['duracao'].'" preload="metadata"  muted="muted">';
                    echo '<source src="files/'.$file['path'].'" type="video/'.$file['tipo'].'">';
                    echo '</video>';
                }else{
                    echo '<img id="'.$file['id'].'" data-duracao="'.$file['duracao'].'" src="files/'.$file['path'].'">';
                }
                echo '</div>';
            }

            ?>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/slide.js"></script>
        <script src="js/getDuration.js"></script>
        <script src="js/collapsible.js"></script>
    </body>
  