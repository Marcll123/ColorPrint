<?php
    require_once '../models/LoginModel.php';
    
    class LoginController{
        public function login(){
            $login = new LoginModel();
            $body = json_decode(file_get_contents("php://input"));    
            return $login->loginUser($body->username, $body->password);
        }
    }
