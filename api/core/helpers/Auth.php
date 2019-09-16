<?php
require  '../../vendor/autoload.php';
use \Firebase\JWT\JWT;

class Auth{
    private $key = "VmVnZ3kxMjMv";
    private $hour = 3600;
  
    public function generateToken($userId){
        $payload = array(
            "exp" => time() + $this->hour,
            "sub"=> $userId
        );
        $jwt = JWT::encode($payload, $this->key);
        return $jwt;
    }

    public function decodeToken($jwt){
        try {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
            $data = (array) $decoded;
            return ["data"=>$data, "error"=> null];
        } catch (Exception $e) {
            return ["data"=>null, "error"=>  $e->getMessage()];
        }
      
    }

}
 
?>
