<?php
    include_once '../api/connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM media";

    $stmt = $db->prepare( $query );

    $stmt->execute();
	
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($stmt){
        $result = "{'success':true, 'data':" . json_encode($data) . "}";
    }
    else{
        $result = "{'success':false}";
    }
    echo($result);
?>