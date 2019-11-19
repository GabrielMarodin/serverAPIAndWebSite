<?php
    include_once 'api/connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM media";

    $stmt = $db->prepare( $query );

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$stmt){
        $data = "{'success':false}";
    }
?>