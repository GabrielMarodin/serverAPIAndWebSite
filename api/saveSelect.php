<?php
    include_once 'connection.php';

    $database = new Database();

    $db = $database->getConnection();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $group_name = $_POST["group_name"];

    $query = "SELECT * FROM media_select WHERE nome = ?";
    $stmt = $db->prepare( $query );
    $stmt->execute([$group_name]);
    $grupos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ( isset($_POST['id_media']) && is_array($_POST['id_media']) && !$grupos){
        
        foreach ($_POST['id_media'] as $id_file){
            $query = "INSERT INTO media_select (id_media,nome) VALUES (?, ?)";
            $stmt = $db->prepare( $query );
            $stmt->execute([$id_file,$group_name]);

        }
        header('Location: ../index.php');
    }else {
        echo 'grupo '.$group_name.' já existe';
    }
   
 ?>