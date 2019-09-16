<?php
require_once '../models/LoginModel.php';

class LoginController
{
    public function login()
    {
        $login = new LoginModel();
        $body = json_decode(file_get_contents("php://input"));
        return $login->loginUser($body->username, $body->password);
    }

    public function login2()
    {
        $login = new LoginModel();
        if (isset($_REQUEST['nombre_usu']) && isset($_REQUEST['clave'])) {
            $user = $_REQUEST['nombre_usu'];
            $pass = $_REQUEST['clave'];
            return $login->loginUser($user, $pass);
        }
    }
}
