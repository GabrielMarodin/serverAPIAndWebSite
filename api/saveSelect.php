<?php
    include_once 'connection.php';

    $database = new Database();

    $db = $database->getConnection();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = "INSERT INTO media_select (id_media, nome) VALUES (?,?)";

    $group_name = $_POST["group_name"];

    if ( isset($_POST['id_media']) && is_array($_POST['id_media']) ){
        
        foreach ($_POST['id_media'] as $id_file){

            $stmt = $db->prepare( $query );
            $stmt->execute([$id_file,$group_name]);

        }
    }
    header('Location: ../index.php');
 ?>