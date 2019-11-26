<?php
    include_once 'connection.php';

    $database = new Database();

    $db = $database->getConnection();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    if ( isset($_POST['id_media']) && is_array($_POST['id_media'])){
        
        foreach ($_POST['id_media'] as $id_file){

            $query = "DELETE media, media_select FROM media LEFT JOIN media_select ON media.id = media_select.id_media WHERE media.id = ? ";

            $stmt = $db->prepare( $query );
            $stmt->execute([$id_file]);
        }

    }else{
        if (isset($_POST['id_media']) && !is_array($_POST['id_media'])) {
            $id_file = $_POST['id_media'];

            $query = "DELETE media, media_select FROM media LEFT JOIN media_select ON media.id = media_select.id_media WHERE media.id = ? ";

            $stmt = $db->prepare( $query );
            $stmt->execute([$id_file]);
        }
        
    }

    if (isset($_POST['group_name']) && is_array($_POST['group_name'])) {
        foreach ($_POST['group_name'] as $group_name){
            $query = "DELETE FROM media_select WHERE nome = ? ";

            $stmt = $db->prepare( $query );
            $stmt->execute([$group_name]);
        }
    }else {
        if (isset($_POST['group_name']) && !is_array($_POST['group_name'])) {
            $group_name = $_POST['group_name'];

            $query = "DELETE FROM media_select WHERE nome = ? ";

            $stmt = $db->prepare( $query );
            $stmt->execute([$group_name]);
        }
    }

    header('Location: ../index.php');
 ?>