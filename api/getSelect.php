<?php

    include_once 'connection.php';

    $select_name = $_GET['select_name'];

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT media.id, media.tipo, media.path, media.titulo, media.duracao 
                FROM media, media_select 
                    WHERE media.id = media_select.id_media AND media_select.nome = ?";

    $stmt = $db->prepare( $query );

    $stmt->execute($select_name);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>