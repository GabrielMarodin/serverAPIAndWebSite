<?php
    include_once '../connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM media";

    $stmt = $db->prepare( $query );

    $stmt->execute();

    $stmt->fetchAll(PDO::FETCH_ASSOC);


    $data = $stmt;


    if(!$stmt){
        $data = "{'success':false}";
    }
?>