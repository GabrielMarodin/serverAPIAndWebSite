<?php
    include_once 'api/connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM media_select LEFT JOIN media ON media_select.id_media = media.id GROUP BY media_select.nome";

    $stmt = $db->prepare( $query );

    $stmt->execute();

    $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>