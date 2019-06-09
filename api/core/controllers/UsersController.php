<?php
require_once '../models/UsersModel.php';
class UsersController
{

    public function show()
    {
        $user = new UserModel();
        $page = $_REQUEST['page'];
        return $user->consult($page - 1);
    }

    public function showNum()
    {
        $detail2 = new UserModel();
        return $detail2->consultNum();
    }

    public function save()
    {
        $name  = $_REQUEST['nombre'];
        $surname = $_REQUEST['apellido'];
        $gender = $_REQUEST['genero'];
        $user = $_REQUEST['nombre_usu'];
        $email = $_REQUEST['correo'];
        $pass = $_REQUEST['clave'];
        $idrol = $_REQUEST['id_rol'];

        $userI = new UserModel();
        return $userI->createUser($name, $surname, $gender, $user, $email, $pass, $idrol);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $userU = new UserModel();
        return $userU->updateUser($body->nombre, $body->apellido, $body->genero, $body->nombre_usu,
            $body->correo, $body->clave,$body->id_rol, $id
        );
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $userE = new UserModel();
        return $userE->deleteUser($id);
    }
}
