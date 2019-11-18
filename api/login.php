<?php
    header("Access-Control-Allow-Origin: * ");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once 'connection.php';
    include_once 'core.php';
    include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
    include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
    include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
    include_once 'vendor/firebase/php-jwt/src/JWT.php';
    use \Firebase\JWT\JWT;
    
    $data = json_decode(file_get_contents("php://input"));

    $email = $data->email;
    $senha = $data->senha;

    $email=htmlspecialchars(strip_tags($email));
    $senha=htmlspecialchars(strip_tags($senha));
    

    $database = new Database();

    $db = $database->getConnection();

    $query = "SELECT * FROM user WHERE email = :email AND senha = :senha ";

    $stmt = $db->prepare( $query );

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();

    $num = $stmt->rowCount();

    if($num > 0 ){

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $id = $row['id'];
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $senha = $row['senha'];

        $token = array( "data" => array(
                "id" => $id,
                "firstname" => $nome,
                "lastname" => $sobrenome,
                "email" => $email
            )
        );
     
        // set response code
        http_response_code(200);
     
        // generate jwt
        $jwt = JWT::encode($token, $key);
        echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt
            )
        );
    }else{
        http_response_code(401);
    }
?> 
