<?php
    include_once 'api/connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT DISTINCT nome FROM media_select";

    $stmt = $db->prepare( $query );

    $stmt->execute();

    $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>