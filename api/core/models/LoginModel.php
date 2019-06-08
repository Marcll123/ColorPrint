<?php
require_once '../helpers/Connection.php';
require_once '../helpers/Auth.php';
class LoginModel extends Connection
{
    public function loginUser($email, $pass)
    {
        $conexion = parent::connect();
        try {
            $sql = $conexion->prepare('SELECT correo FROM usuarios WHERE correo = ?');
            $sql->execute(array($email));
            $res = $sql->fetchAll();
            foreach ($res as $row) {
                if ($email === $row['correo']) {
                    $auth = new Auth();
                    $token = $auth->generateToken(20);
                    $array = [
                        'token' => $token,
                        'username' => $email,
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
