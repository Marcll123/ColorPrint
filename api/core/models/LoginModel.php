<?php

require_once '../helpers/connection.php';
require_once '../helpers/Auth.php';
class LoginModel extends Connection
{

    public function loginUser($username)
    {
        $conexion = parent::connect();
        try {

            $sql = $conexion->prepare('SELECT nombre_usu FROM usuarios WHERE nombre_usu = ?');
            $sql->execute(array($username));
            $res = $sql->fetchAll();
            foreach ($res as $row) {
                if ($username === $row['nombre_usu']) {
                    $auth = new Auth();
                    $token = $auth->generateToken(20);
                    $array = [
                        'token' => $token,
                        'username' => $username,
                        'permission' => [1, 2, 3]

                    ];
                    return json_encode($array);
                } else {
                    throw new Exception('El usuario no existe');
                }
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
