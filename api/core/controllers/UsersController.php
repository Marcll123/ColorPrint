<?php
require_once '../models/UsersModel.php';
require_once '../helpers/Validator.php';
class UsersController
{

    public function show()
    {
        $user = new UserModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $user->consult($page - 1);
        }
    }
    public function showone()
    {
        $user = new UserModel();
        if (isset($_REQUEST['user']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['user'])) {
            $profile = $_REQUEST['user'];
            return $user->consultOneUser($profile);
        }
    }

    public function showNum()
    {
        $detail2 = new UserModel();
        return $detail2->consultNum();
    }

    public function save()
    {
        $val = new Validator();
        $error_encontrado = "";
        if ($val->validar_clave($_REQUEST["clave"], $error_encontrado)) {
            if ($confirmpass = $_REQUEST['cofimarclave'] === $pass = $_REQUEST['clave']) {
                if ($user = $_REQUEST['nombre_usu'] !== $pass = $_REQUEST['clave']) {
                    $name  = $_REQUEST['nombre'];
                    $surname = $_REQUEST['apellido'];
                    $gender = $_REQUEST['genero'];
                    $user = $_REQUEST['nombre_usu'];
                    $email = $_REQUEST['correo'];
                    $idrol = $_REQUEST['id_rol'];
                    $userI = new UserModel();
                    return $userI->createUser($name, $surname, $gender, $user, $email, $pass, $idrol);
                }
            }
        }
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $val = new Validator();
        $error_encontrado = "";
        if ($val->validar_clave($body->clave, $error_encontrado)) {
            if ($body->cofimarclave === $body->clave) {
                if ($body->nombre_usu !== $body->clave) {
                    $userU = new UserModel();
                    return $userU->updateUser(
                        $body->nombre,
                        $body->apellido,
                        $body->genero,
                        $body->nombre_usu,
                        $body->correo,
                        $body->clave,
                        $body->id_rol,
                        $id
                    );
                }
            }
        }
    }

    public function updateProfile()
    {
        $user = $_REQUEST['user'];
        $body = json_decode(file_get_contents("php://input"));

        $val = new Validator();
        $error_encontrado = "";
        if ($val->validar_clave($body->clave, $error_encontrado)) {
            if ($body->cofimarclave === $body->clave && $body->clave != $body->claveantigua) {
                if ($body->nombre_usu !== $body->clave) {
                    $userU = new UserModel();
                    return $userU->updateUserProfile(
                        $body->nombre,
                        $body->apellido,
                        $body->genero,
                        $body->nombre_usu,
                        $body->correo,
                        $body->clave,
                        $body->id_rol,
                        $user
                    );
                }
            }
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $userE = new UserModel();
        return $userE->deleteUser($id);
    }
}
