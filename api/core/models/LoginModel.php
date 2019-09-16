<?php

require_once '../helpers/connection.php';
require_once '../helpers/Auth.php';

class LoginModel extends Connection
{

    public function loginUser($username, $pass)
    {
        $conexion = parent::connect();
        try {

            $sql = $conexion->prepare('SELECT * FROM usuarios WHERE nombre_usu = ?');
            $sql->execute(array($username));
            $res = $sql->fetchAll();
            $row = $res[0];

            if (password_verify($pass, $row['clave'])) {
                $auth = new Auth();
                $token = $auth->generateToken($row['id_usuario']);
                $array = [
                    'token' => $token,
                    'username' => $username,
                    'rol' => $row['id_rol'],
                ];
                return json_encode($array);
            } else {
                throw new Exception("Usuario o contraseña incorrecta");
            }
        } catch (Exception $e) {
            $array = [
                'message' => 'Error',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
}
