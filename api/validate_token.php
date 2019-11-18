<?php
    header("Access-Control-Allow-Origin: * ");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    include_once 'core.php';
    include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
    include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
    include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
    include_once 'vendor/firebase/php-jwt/src/JWT.php';
    use \Firebase\JWT\JWT;

    $data = json_decode(file_get_contents("php://input"));
    
    $jwt=isset($data->jwt) ? $data->jwt : "";

    if($jwt){
 
        // if decode succeed, show user details
        try {
            // decode jwt
            $decoded = JWT::decode($jwt, $key);
     
            // set response code
            http_response_code(200);
     
            // show user details
            echo json_encode(array(
                "message" => "Access granted.",
                "data" => $decoded->data
            ));
     
        }
        catch (Exception $e){
 
            // set response code
            http_response_code(401);
         
            // tell the user access denied  & show error message
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }

    }
    else{
    
        // set response code
        http_response_code(401);
    
        // tell the user access denied
        echo json_encode(array("message" => "Access denied."));
    }
?>