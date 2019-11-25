<?php
    include_once 'connection.php';

    $database = new Database();

    $db = $database->getConnection();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $group_name = $_POST["group_name"];

    if ( isset($_POST['id_media']) && is_array($_POST['id_media']) && !isset($_POST["group_name"]) ){
        
        foreach ($_POST['id_media'] as $id_file){

            $query = "DELETE FROM media WHERE id = ? ";

            $stmt = $db->prepare( $query );
            $stmt->execute($id_file);

        }

    }else{
        $query = "DELETE FROM media_select WHERE group_name = ? ";

        $stmt = $db->prepare( $query );
        $stmt->execute($group_name);
    }

    header('Location: ../index.php');
 ?>