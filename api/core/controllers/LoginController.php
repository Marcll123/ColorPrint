<?php
    require_once '../models/LoginModel.php';
    header('Access-Control-Allow-Origin: http://localhost:8080');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json');
    class LoginController{
        public function login(){
            $login = new LoginModel();
            $body = json_decode(file_get_contents("php://input"));    
            return $login->loginUser($body->username, $body->password);
        }
    }
