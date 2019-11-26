<?php
    include_once 'api/connection.php';

    $database = new Database();

    $db = $database->getConnection();


    if (isset($_GET['group_name'])) {
        $group_name = $_GET['group_name'];
        $query = "SELECT * FROM media_select INNER JOIN media ON media_select.id_media = media.id WHERE media_select.nome = ?";
        $stmt = $db->prepare( $query );
        $stmt->execute([$group_name]);
    }else {
        $query = "SELECT * FROM media";
        $stmt = $db->prepare( $query );
        $stmt->execute();
    }
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>