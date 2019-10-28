<?php
    include_once 'connection.php';

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM media";

    $stmt = $db->prepare( $query );

    $stmt->execute();

    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){

        $data[] = array(
            'id' => $row['id'],
            'tipo' => $row['tipo'],
            'path' => $row['path'],
            'id_user' => $row['id_user'],
            'titulo' => $row['titulo'],
            'duracao' => $row['duracao'],
            'data_upload' => $row['data_upload']
        );
    }

    if($stmt){
        $result = "{'success':true, 'data':" . json_encode($data) . "}";
    }
    else{
        $result = "{'success':false}";
    }
    echo($result);
?>