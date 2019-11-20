<?
    include_once 'connection.php';
    
    $id_file = $_POST["id_media"];
    $group_name = $_POST["group_name"];

    $database = new Database();

    $db = $database->getConnection();
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $query = "INSERT INTO media_select (id_media, nome) VALUES (?,?)";
    $stmt = $db->prepare( $query );
    $stmt->execute([$id_file,$group_name]);

    header('Location: ../index.php);
 ?>